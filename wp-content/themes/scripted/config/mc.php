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

  function mandrill_send_confirmation ( $gift ) {
    try {
      $mandrill = new Mandrill(SE_MANDRILL_API_KEY);
      $template = 'gift-confirmation';
      $fields = get_fields($gift);
      $content = array(
        array(
          'name' => get_the_title($gift)
        ),
        array(
          'amount' => $fields['amount']
        ),
        array(
          'confirmation_url' => get_permalink($gift)
        )
      );
      wp_mail('hello@gusmiller.com',$fields['amount'], 'the message yo!');

      $message = array(
        'template_name' => $template, 
        'template_content' => $content,
        'to' => array(
          array(
            'email' => $fields['email'],
            'name' => get_the_title($gift)
          )
        ),
        'metadata' => array(
          'amount' => $fields['amount']
        ),
        'global_merge_vars' => array(
          array(
            'name' => 'confirmation_url',
            'content' => get_permalink($gift)
          ),
          array(
            'name' => 'amount',
            'content' => $fields['amount']
          ),
          array(
            'name' => 'donor_name',
            'content' => get_the_title($gift)
          )
        )
      );

      return $mandrill->messages->sendTemplate($template, $content, $message);

    } catch(Mandrill_Error $e) {
      return $e;
    }

  }