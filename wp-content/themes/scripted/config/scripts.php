<? # Javascript

  $scripts_path = ( get_template_directory_uri() . '/assets/js/' );

  # ScriptEd
  wp_register_script('app', $scripts_path . 'app.js', ['stripe'], '0.2.0', true);
  wp_localize_script('app', 'ScriptEd', [
    'ajax_url' => admin_url('admin-ajax.php'),
    'environment' => SE_ENVIRONMENT,
    'stripe_publishable_key' => SE_STRIPE_PUBLISHABLE_API_KEY,
    'cookie_path' => COOKIEPATH,
    'cookie_domain' => COOKIE_DOMAIN
  ]);
  wp_enqueue_script('app');

  # Stripe
  wp_register_script('stripe', 'https://js.stripe.com/v2/stripe.js', null, '', true);
  wp_enqueue_script('stripe');
