<? namespace ScriptEd;

use Stripe,
    Mandrill;

class Gift {
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
        $charge = Stripe\Customer::create([
          'description' => 'Recurring donor.',
          'source' => $donation['stripe-token'],
          'plan' => $donation['plan-id']
        ]);

        $gift = array_merge($gift, [
          'amount' => $charge->subscription['plan']['amount'],
          'recurring' => true,
          'charge' => $charge,
          'status' => $charge->status
        ]);
      } else {
        $charge = Stripe\Charge::create([
          'amount' => $donation['amount'],
          'currency' => 'usd',
          'card' => $donation['stripe-token'],
          'description' => $donation['name-first'] . ' ' . $donation['name-last']
        ]);

        $gift = array_merge($gift, [
          'amount' => $charge->amount,
          'recurring' => false,
          'charge' => $charge
        ]);
      }

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
      'post_name' => md5(microtime(true)),
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
    }

    # Let's hang on to this
    add_post_meta($donation, 'stripe_log', $params['charge']);

    return $donation;
  }

  public static function find ($hash) {
    $donations = get_posts([
      'post_name' => $hash
    ]);

    if ( $donation = a::first($donations[0]) ) {
      return $donation;
    } else {
      return false;
    }
  }

  public static function destroy ($hash) {
    if ( $donation = static::find($hash) ) {
      $fields = get_fields($donation->ID);

      if ( static::is_recurring($donation) ) {
        try {
          $donor = \Stripe\Customer::retrieve($fields['customer_id']);
          $status = $donor->subscriptions->retrieve($fields['subscription_id'])->cancel();

          update_field(Info::$field_keys['subscription_status'], $status->status, $donation);

          add_post_meta($donation, 'stripe_log', $params['charge']);

          return $status;
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
}
