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

    if ( !isset($donor['stripe-token']) ) {
      wp_send_json_error(array(
        'message' => 'Sorry, your payment couldn\'t be completed. Our server did not receive all the information it requires to move forward. Please reload the page and try again.',
        # 'post' => $donor
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
        # 'post' => $donor,
        'stripe' => $charge,
        'confirmation_path' => get_permalink($donation),
        'confirmation_email' => $confirmation
      ));

    } catch ( Stripe_CardError $e ) {
      $error = $e->getJsonBody();
      $error = $error['error'];

      wp_send_json_error(array( 
        'message' => $error['message'],
        # 'post' => $donor
      ));
    } catch ( Stripe_AuthenticationError $e ) {
      $error = $e->getJsonBody()['error'];
      
      wp_send_json_error(array(
        'message' => $error['message'],
        # 'post' => $donor
      ));
    } catch ( Stripe_InvalidRequestError $e ) {
      $error = $e->getJsonBody()['error'];
      
      wp_send_json_error(array(
        'message' => $error['message'],
        # 'post' => $donor
      ));
    }
  }
