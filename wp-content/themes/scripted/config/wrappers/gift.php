<? namespace ScriptEd;

use Stripe,
    Mandrill,
    a;

class Gift {
  public static $statuses = [
    'manual' => 'Manual',
    'active' => 'Active',
    'trialing' => 'Trial',
    'past_due' => 'Past Due',
    'canceled' => 'Canceled',
    'unpaid' => 'Unpaid'
  ];

  public static function process () {
    # Payload is our serialized form, or at least everything fit to submit...
    $donation = [];
    # Expand our serialized array (jQuery POSTs these in an odd way...)
    foreach ( $_POST['payload'] as $index => $param ) {
      $donation[$param['name']] = $param['value'];
    }

    # Any request without a stripe token is wrong.
    if ( !isset($donation['stripe-token']) ) {
      wp_send_json_error([
        'message' => 'Sorry, your payment couldn\'t be completed. Our server did not receive all the information it requires to move forward. Please reload the page and try again.',
        'post' => $donation
      ]);
    }

    $gift = [
      'name-first' => $donation['name-first'],
      'name-last' => $donation['name-last'],
      'email' => $donation['email'],
      'zip' => $donation['zip']
    ];

    try {
      if ( isset($donation['recurring']) ) {
        # Chain our subscription to the creation of a Stripe Customer
        $charge = Stripe\Customer::create([
          'description' => 'Recurring donor.',
          'source' => $donation['stripe-token'],
          'plan' => $donation['plan-id']
        ]);

        # Then set up our Gift creation params
        $gift = array_merge($gift, [
          'amount' => $charge->subscription['plan']['amount'],
          'recurring' => true,
          'charge' => $charge,
          'status' => $charge->subscription['status'],
          'plan' => $donation['plan-id']
        ]);
      } else {
        # Use the standard Stripe Charge, since we don't need to track a customer
        $charge = Stripe\Charge::create([
          'amount' => $donation['amount'],
          'currency' => 'usd',
          'card' => $donation['stripe-token'],
          'description' => $donation['name-first'] . ' ' . $donation['name-last']
        ]);

        # Then set up our Gift creation params
        $gift = array_merge($gift, [
          'amount' => $charge->amount,
          'recurring' => false,
          'charge' => $charge
        ]);
      }

      # Add a record of this to the DB and send a confirmation
      $donation = static::create($gift);
      $confirmation = static::send_confirmation($donation);

      wp_send_json_success([
        'post' => $donation,
        'stripe' => $charge,
        'confirmation_path' => get_permalink($donation),
        'confirmation_email' => $confirmation
      ]);

    } catch (Stripe\Error\Card $e) {
      $error = $e->getJsonBody();
      $error = $error['error'];

      wp_send_json_error([
        'message' => $error['message'],
        # 'post' => $donation
      ]);
    } catch (Stripe\Error\Authentication $e) {
      $error = $e->getJsonBody();
      $error = $error['error'];
      
      wp_send_json_error([
        'message' => $error['message'],
        # 'post' => $donation
      ]);
    } catch (Stripe\Error\InvalidRequest $e) {
      $error = $e->getJsonBody();
      $error = $error['error'];
      
      wp_send_json_error([
        'message' => $error['message'],
        # 'post' => $donation
      ]);
    }
  }

  public static function send_confirmation($gift) {
    try {
      $mandrill = new Mandrill(SE_MANDRILL_API_KEY);
      $template = 'gift-confirmation';
      $fields = get_fields($gift);
      $content = [
        ['name' => get_the_title($gift)],
        ['amount' => $fields['amount']],
        ['confirmation_url' => get_permalink($gift)],
        ['date' => get_the_date('F d, Y', $gift)]
      ];
      
      $message = [
        'template_name' => $template, 
        'template_content' => $content,
        'to' => [
          [
            'email' => $fields['email'],
            'name' => get_the_title($gift)
          ]
        ],
        'metadata' => [
          'amount' => $fields['amount']
        ],
        'global_merge_vars' => [
          [
            'name' => 'confirmation_url',
            'content' => get_permalink($gift)
          ],
          [
            'name' => 'amount',
            'content' => $fields['amount']
          ],
          [
            'name' => 'donor_name',
            'content' => get_the_title($gift)
          ],
          [
            'name' => 'date',
            'content' => get_the_date('F d, Y', $gift)
          ]
        ]
      ];

      return $mandrill->messages->sendTemplate($template, $content, $message);

    } catch(Mandrill_Error $e) {
      return $e;
    }
  }

  public static function create ($params) {
    $donation = wp_insert_post([
      'post_name' => sha1(uniqid() . $params['name-first']),
      'post_title' => sanitize_text_field($params['name-first']) . ' ' . sanitize_text_field($params['name-last']),
      'post_type' => 'se_gift',
      'post_status' => 'publish',
      'ping_status' => 'closed'
    ]);

    update_field(Info::$field_keys['give_email'], $params['email'], $donation);
    update_field(Info::$field_keys['give_zip'], $params['zip'], $donation);
    update_field(Info::$field_keys['recurring'], $params['recurring'], $donation);
    update_field(Info::$field_keys['give_amount'], ($params['amount'] / 100), $donation);
    
    if ( $params['recurring'] ) {
      update_field(Info::$field_keys['customer_id'], $params['charge']->id, $donation);
      update_field(Info::$field_keys['subscription_id'], $params['charge']->subscription['id'], $donation);
      update_field(Info::$field_keys['subscription_status'], $params['status'], $donation);
      update_field(Info::$field_keys['plan_id'], $params['plan'], $donation);
    }

    # Let's hang on to this
    add_post_meta($donation, 'stripe_log', $params['charge']);

    return $donation;
  }

  public static function find_by_hash ($hash) {
    $donations = get_posts([
      'post_name' => $hash,
      'post_type' => 'se_gift'
    ]);

    if ( $donation = a::first($donations) ) {
      return $donation;
    } else {
      return false;
    }
  }

  public static function cancel ($hash) {
    if ( $donation = static::destroy($hash) ) {
      wp_send_json_success([
        'status' => get_field('subscription_status', $donation)
      ]);
    } else {
      wp_send_json_error([
        'message' => 'We were unable to cancel your recurring donation. Please try again. If the problem persists, please let us know so we can properly update your donation!'
      ]);
    }
  }

  public static function destroy ($hash) {
    if ( $donation = static::find_by_hash($hash) ) {
      $fields = get_fields($donation->ID);

      if ( static::is_recurring($donation) ) {
        try {
          $donor = \Stripe\Customer::retrieve($fields['customer_id']);
          $subscription = $donor->subscriptions->retrieve($fields['subscription_id'])->cancel();
          update_field(Info::$field_keys['subscription_status'], $subscription->status, $donation);

          add_post_meta($donation, 'stripe_log', $subscription);
          return $subscription->status;
        } catch (\Stripe\Error\Base $e) {
          return false;
        }
      }
    } else {
      return false;
    }
  }

  public static function is_recurring ($donation) {
    $fields = get_fields($donation);
    return isset($fields['recurring']) && $fields['recurring'] == true;
  }

  public static function recurring_plans () {
    return Helpers::option('recurring_donation_plans');
  }

  public static function label_for_plan_id ($plan_id) {
    $plans = static::recurring_plans();
    foreach ( $plans as $id => $plan ) {
      if ( $plan_id === $plan['id'] ) return $plan['label'];
    }
    return 'Unknown or Legacy Plan';
  }
}
