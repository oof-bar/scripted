<? namespace ScriptEd;

class Newsletter {
  public static function signup() {
    # Instantiate MailChimp
    $MC = new \Mailchimp(SE_MAILCHIMP_API_KEY);

    # Capture the Email Address
    $email = $_POST['email'];

    $payload = [
      'request' => $_POST
    ];

    try {
      $response = $MC->lists->subscribe(se_option('mailchimp_list'), ['email' => $email]);
      // $payload['mc'] = $response;
      $payload['message'] = 'Cool! Thanks for signing up.<br/>Please check the inbox for <span class="email-subscribed">' . $response["email"] . '</span> to confirm your subscription.';
      wp_send_json_success($payload);

    } catch ( Mailchimp_Error $e ) {
      if ( $e->getMessage() ) {
        $payload['message'] = $e->getMessage();
      } else {
        $payload['message'] = "Uh oh! Something weird happened.";
      }

      wp_send_json_error($payload);
    }
  }
}
