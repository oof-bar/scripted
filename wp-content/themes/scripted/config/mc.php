<?

  add_action( 'wp_ajax_email_signup', 'mc_newsletter_signup' );
  add_action( 'wp_ajax_nopriv_email_signup', 'mc_newsletter_signup' );

  function mc_newsletter_signup ( ) {
    # Instantiate MailChimp
    $MC = new Mailchimp(SE_MAILCHIMP_API_KEY);

    # Capture the Email Address
    $email = $_POST['email'];

    $payload = array(
      'request' => $_POST
    );


    if ( !wp_verify_nonce( $_POST['nonce'], 'email_signup_nonce') ) {
      $payload['message'] = "Sorry, we've flagged this as a dangerous request.";
      wp_send_json_error( $payload );
    }

    try {
      $response = $MC->lists->subscribe(se_option('mailchimp_list'), array('email'=>$email));
      $payload['mc'] = $response;
      $payload['message'] = 'Cool! Thanks for signing up.<br/>Please check the inbox for <span class="email-subscribed">' . $response["email"] . '</span> to confirm your subscription.';
      wp_send_json_success( $payload );

    } catch ( Mailchimp_Error $e ) {
      if ( $e->getMessage() ) {
        $payload['message'] = $e->getMessage();
      } else {
        $payload['message'] = "Uh oh! Something weird happened.";
      }

      wp_send_json_error( $payload );
    }
  }