<? namespace ScriptEd;

use Stripe,
    Mandrill,
    html,
    r,
    a;

class Gift {
  public static $post_type = 'se_gift';
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
        'message' => Helpers::markdown('Sorry, your payment couldn\'t be completed. Our server did not receive all the information it requires to move forward. Please reload the page and try again.'),
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
          'description' => $donation['name-first'] . ' ' . $donation['name-last'],
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

        $donation = static::save($gift);

        # And send a welcome email
        $confirmation = Mailer::send_template($gift['email'], get_the_title($donation), 'recurring-donation-confirmation', [
          'name' => $gift['name-first'],
          'plan' => static::label_for_plan_id($gift['plan']),
          'confirmation_url' => html::a(get_permalink($donation), get_permalink($donation)),
          'date' => get_the_date('F d, Y', $donation)
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

        $donation = static::save($gift);

        $confirmation = Mailer::send_template($gift['email'], get_the_title($donation), 'one-time-donation-confirmation', [
          'name' => get_the_title($donation),
          'amount' => $gift['amount'],
          'confirmation_url' => html::a(get_permalink($donation), get_permalink($donation)),
          'date' => get_the_date('F d, Y', $donation)
        ]);
      }

      wp_send_json_success([
        'post' => $donation,
        # 'stripe' => $charge,
        'confirmation_path' => get_permalink($donation),
        'confirmation_email' => $confirmation
      ]);

    } catch (Stripe\Error\Base $e) {
      $error = $e->getJsonBody();
      $error = $error['error'];

      wp_send_json_error([
        'message' => Helpers::markdown($error['message']),
        # 'post' => $donation
      ]);
    }
  }

  public static function save ($params) {
    $donation = wp_insert_post([
      'post_name' => sha1(uniqid() . $params['name-first']),
      'post_title' => sanitize_text_field($params['name-first']) . ' ' . sanitize_text_field($params['name-last']),
      'post_type' => static::$post_type,
      'post_status' => 'publish',
      'ping_status' => 'closed'
    ]);

    update_field(Info::field_key('give_email'), $params['email'], $donation);
    update_field(Info::field_key('give_zip'), $params['zip'], $donation);
    update_field(Info::field_key('recurring'), $params['recurring'], $donation);
    update_field(Info::field_key('give_amount'), ($params['amount'] / 100), $donation);
    
    if ( $params['recurring'] ) {
      update_field(Info::field_key('customer_id'), $params['charge']->id, $donation);
      update_field(Info::field_key('subscription_id'), $params['charge']->subscription['id'], $donation);
      update_field(Info::field_key('subscription_status'), $params['status'], $donation);
      update_field(Info::field_key('plan_id'), $params['plan'], $donation);
    }

    # Let's hang on to this
    add_post_meta($donation, 'stripe_log', $params['charge']);

    return $donation;
  }

  public static function log () {
    $event = json_decode(r::body(), true);
    # Cache the event
    switch ($event['type']) {
      case ('invoice.payment_succeeded'):
        $invoice = $event['data']['object'];

        $next_payment = a::first(array_filter($invoice['lines']['data'], function ($line) use ($invoice) {
          return $line['id'] == $invoice['subscription'];
        }))['period']['end'];

        $donation = static::find_by_subscription_id($invoice['subscription']);

        if ( $donation ) {
          add_post_meta($donation, 'stripe_log', $event);

          # Set the next payment date and fetch all the fields
          update_field(Info::field_key('next_payment'), $next_payment, $donation);
          $fields = get_fields($donation);

          # Send Receipt
          $receipt = Mailer::send_template($fields['email'], get_the_title($donation), 'recurring-donation-invoice', [
            'name' => get_the_title($donation),
            'plan' => static::label_for_plan_id($fields['plan_id']),
            'confirmation_url' => html::a(get_permalink($donation), get_permalink($donation)),
            'created' => get_the_date('F d, Y', $donation),
            'next_payment' => date('F d, Y', $fields['next_payment'])
          ]);

          wp_send_json_success(['mc' => $receipt]);
        }
        break;
      default:
        wp_send_json_success();
        break;
    }
  }

  public static function cancel () {
    if ( isset($_POST['id']) && $donation = static::destroy($_POST['id']) ) {
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
          update_field(Info::field_key('subscription_status'), $subscription->status, $donation);

          update_field(Info::field_key('canceled_at'), time(), $donation);

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

  public static function find_by_hash ($hash) {
    $donations = get_posts([
      'post_name' => $hash,
      'post_type' => static::$post_type
    ]);

    if ( $donation = a::first($donations) ) {
      return $donation;
    } else {
      return false;
    }
  }

  public static function find_by_subscription_id ($id) {
    $donations = get_posts([
      'post_type' => static::$post_type,
      'meta_query' => [
        [
          'key' => 'subscription_id',
          'value' => $id
        ]
      ]
    ]);

    if ( $donation = a::first($donations) ) {
      return $donation;
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
