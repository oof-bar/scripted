<? namespace ScriptEd;

class Actions {
  public static function respond() {
    # Get arguments passed to hook:
    $arguments = func_get_args();

    # Pull off the first one, since it's equivalent to (and
    # potentially more reliable than) `current_action()`:
    $action = array_shift($arguments);

    # Test that the method is present:
    if ( method_exists(get_class(), $action) ) {
      # Call the corresponding static Action::method and stash the response
      $response = call_user_func_array(['ScriptEd\Actions', $action], $arguments);
      return $response;
    }
    return;
  }

  public static function init() {
    Initializers::create_post_types();
    Initializers::create_thumbnail_versions();
    Initializers::register_menus();
    Initializers::add_options_pages();
    add_post_type_support('page', 'excerpt');
  }

  public static function registered_post_type ($post_type, $args) {
    // Util::dump(['type' => $post_type, 'args' => $args]);
  }

  public static function admin_init () {
    # Editor Styles
    # Broken after switch to Grunt. We should get this working again, somehow…
    # add_editor_style('stylesheets/editor-style.css');
  }

  # Add Scripts and Stylesheets
  public static function wp_enqueue_scripts () {
    $scripts_path = ( get_template_directory_uri() . '/assets/js/' );

    # Script: App
    wp_register_script('app', $scripts_path . 'app.js', ['stripe'], '0.2.0', true);
    wp_localize_script('app', 'ScriptEd', [
      'ajax_url' => admin_url('admin-ajax.php'),
      'environment' => SE_ENVIRONMENT,
      'stripe_publishable_key' => SE_STRIPE_PUBLISHABLE_API_KEY,
      'cookie_path' => COOKIEPATH,
      'cookie_domain' => COOKIE_DOMAIN
    ]);
    wp_enqueue_script('app');

    # Script: Stripe
    wp_register_script('stripe', 'https://js.stripe.com/v2/stripe.js', null, '', true);
    wp_enqueue_script('stripe');


    # Stylesheet: App
    wp_register_style('app', get_template_directory_uri() . '/assets/css/app.css' );
    wp_enqueue_style('app');
  }

  public static function pre_get_posts ($query) {
    if ( $query[0]->get('post_type') == 'se_aggregator' && !is_admin() ) {
      $query[0]->set('post_type', ['se_aggregator', 'post', 'se_event', 'se_resource', 'se_student_voice']);
    }
  }

  public static function pre_get_shortlink () {
    return __return_empty_string();
  }

  # Admin Column customization
  public static function manage_se_event_posts_columns ($columns) {
    return array_merge($columns, [
      'event_date' => 'Event Date',
      'host' => 'Host'
    ]);
  }

  public static function manage_se_event_posts_custom_column ($column) {
    switch ($column) {
      case 'event_date':
        return get_field('date_start', $post->ID);
        break;

      case 'host':
        return get_field('host', $post->ID);
        break;

      default:
        break;
    }
  }

  # CMS Events
  public static function save_post ($post) {
    Narrative::clean($post);
  }

  # AJAX Actions

  public static function wp_ajax_email_signup () {
    Newsletter::signup();
  }

  public static function wp_ajax_nopriv_email_signup () {
    Newsletter::signup();
  }

  # Donations

  public static function wp_ajax_give () {
    Gift::process();
  }

  public static function wp_ajax_nopriv_give () {
    Gift::process();
  }

  public static function wp_ajax_give_hook () {
    Gift::log($_POST);
  }

  public static function wp_ajax_nopriv_give_hook () {
    Gift::log($_POST);
  }

  public static function wp_ajax_cancel_recurring_donation () {
    Gift::cancel();
  }
  
  public static function wp_ajax_nopriv_cancel_recurring_donation () {
    Gift::cancel();
  }
}
