<? # Development Scripts

  $scripts_path = ( get_template_directory_uri() . '/scripts/' );

  # ScriptEd
  wp_register_script('scripted', $scripts_path . 'scripted.js', array('jquery'), '0.1.0', true);
  wp_localize_script('scripted', 'global', array(
    'ajax_url' => admin_url('admin-ajax.php'),
    'environment' => 'development'
  ));
  wp_enqueue_script('scripted');

  # Newsletter
  wp_register_script('newsletter', $scripts_path . 'newsletter.js', array('jquery'), '0.1.0', true);
  wp_enqueue_script('newsletter');

  # Helpers
  wp_register_script('helpers', $scripts_path . 'helpers.js', array('jquery'), '0.1.0', true);
  wp_enqueue_script('helpers');

  # Donate
  wp_register_script('donate', $scripts_path . 'donate.js', array('jquery','stripe'), '0.1.0', true);
  wp_enqueue_script('donate');

  # Volunteer
  # wp_register_script('volunteer', $scripts_path . 'volunteer.js', array('jquery'), '0.1.0', true);
  # wp_enqueue_script('volunteer');

  # Testimonial Slider
  wp_register_script('testimonials', $scripts_path . 'testimonials.js', array('jquery'), '0.1.0', true);
  wp_enqueue_script('testimonials');

  # Select Menu
  wp_register_script('select', $scripts_path . 'select.js', array('jquery'), '0.1.0', true);
  wp_enqueue_script('select');

  # Stripe
  wp_register_script('stripe', 'https://js.stripe.com/v2/stripe-debug.js', array('jquery'), '', false);
  wp_enqueue_script('stripe');

  # jQuery
  wp_register_script('jquery-se', get_template_directory_uri() . '/scripts/src/lib/jquery.min.js', array(), '1.11.1', false);
  wp_enqueue_script('jquery-se');

  # jQuery Validate
  wp_register_script('jquery-validate', get_template_directory_uri() . '/scripts/src/lib/jquery.validate.js', array('jquery'), '1.13.0');
  wp_enqueue_script('jquery-validate');
