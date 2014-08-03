<?

  Stripe::setApiKey(SE_STRIPE_API_KEY);

  add_action( 'wp_ajax_give', 'se_give' );
  add_action( 'wp_ajax_nopriv_give', 'se_give' );

  function se_give ( ) {

    # Payload is our serialized form, or at least everything fit to submit...
    $donor = array();
    foreach ( $_POST['payload'] as $index => $param ) {
      $donor[$param['name']] = $param['value'];
    }

    if ( !wp_verify_nonce($donor['nonce'], 'give_nonce') || !isset($donor['stripe-token']) ) {
      wp_send_json_error(array(
        'post' => $donor,
        'message' => 'Sorry, your payment couldn\'t be completed, because we identified a potentially malicious request.'
      ));
    }


    try {
      $charge = Stripe_Charge::create(array(
        'amount' => $donor['amount'],
        'currency' => 'usd',
        'card' => $donor['stripe-token'],
        'description' => $donor['name-first'] . ' ' . $donor['name-last']
      ));

      $donation = create_donation( $donor['name-first'], $donor['name-last'], $donor['email'], $donor['amount'], $donor['zip'] );

      $confirmation = mandrill_send_confirmation( $donation );

      wp_send_json_success(array(
        'post' => $donor,
        'stripe' => $charge,
        'confirmation_path' => get_permalink($donation),
        'confirmation_email' => $confirmation
      ));

    } catch ( Stripe_CardError $e ) {
      wp_send_json_error( array( 'stripe' => $e, 'post' => $donor ) );
    } catch ( Stripe_AuthenticationError $e ) {
      wp_send_json_error( array( 'stripe' => $e, 'post' => $donor ) );
    }
  }
