<?

  Stripe::setApiKey(SE_STRIPE_API_KEY);

  add_action( 'wp_ajax_give', 'se_give' );
  add_action( 'wp_ajax_nopriv_give', 'se_give' );

  function se_give ( ) {

    if ( !wp_verify_nonce($_POST['nonce'], 'give_nonce') || !isset($_POST['stripe_token']) ) {
      wp_send_json_error(array(
        'post' => $_POST,
        'message' => 'Sorry, your payment couldn\'t be completed, because we identified a potentially malicious request.'
      ));
    }

    try {
      # Stripe::setApiKey(getenv('STRIPE_APIKEY'));
      $charge = Stripe_Charge::create(array(
        'amount' => $_POST['amount'],
        'currency' => 'usd',
        'card' => $_POST['stripe_token'],
        'description' => 'test'
      ));
      /*
      wp_insert_post(array(
        'asdf'
      ));
      */
      wp_send_json_success(array(
        'post' => $_POST,
        'stripe' => $charge
      ));

    } catch ( Stripe_CardError $e ) {
      wp_send_json_error( array( 'stripe' => $e, 'post' => $_POST ) );
    } catch ( Stripe_AuthenticationError $e ) {
      wp_send_json_error( array( 'stripe' => $e, 'post' => $_POST ) );
    }
  }