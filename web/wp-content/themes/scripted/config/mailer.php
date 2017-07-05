<? namespace ScriptEd;

use Mandrill,
    html;

class Mailer {
  public static $instance;

  public static function get_instance () {
    if ( static::$instance ) {
      return static::$instance;
    } else {
      return static::$instance = new Mandrill($_SERVER['MANDRILL_API_KEY']);
    }
  }

  public static function send_template ($email, $name, $template, $regions) {
    try {
      $interface = static::get_instance();
      return $interface->messages->sendTemplate($template, static::merge_vars($regions), [
        'to' => [
          [
            'email' => $email,
            'name' => $name
          ]
        ]
      ]);

    } catch(Mandrill_Error $e) {
      return $e;
    }
  }

  public static function merge_vars ($params) {
    $merge = [];
    foreach ( $params as $key => $val ) {
      array_push($merge, [
        'name' => $key,
        'content' => $val
      ]);
    }
    return $merge;
  }
}
