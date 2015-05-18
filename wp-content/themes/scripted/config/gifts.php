<? /* Events */

function add_cpt_gifts ( ) { 

  register_post_type('se_gift', array(
    'label' => "Gifts",
    'labels' => array(  
      'name' => 'Gifts',
      'singular_name' => 'Gift',
      'menu_name' => 'Gifts',
      'name_admin_bar' => 'Gift',
      'all_items' => 'All Gifts',
      'add_new' => 'New Gift',
      'add_new_item' => 'Create New Gift',
      'edit_item' => 'Edit Gift',
      'new_item' => 'New Gift',
      'view_item' => 'View Gift',
      'search_items' => 'Search Gifts',
      'not_found' => 'No Gifts Found',
      'not_found_in_trash' => 'No Gifts Found in Trash'
    ),
    'description' => 'A gift is a successful charge to a credit card. We capture a few bits of info about the donor and save them here.',
    'public' => true,
    'publicaly_queryable' => false,
    'exclude_from_search' => true,
    'query_var' => false,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 52,
    'menu_icon' => 'dashicons-awards',
    'hierarchical' => false,
    'supports' => array('title'),
    'has_archive' => false,
    'rewrite' => array(
      'slug' => 'donation',
      'pages' => false
    )
  ));

  add_filter('manage_se_gift_posts_columns' , 'add_cpt_columns_se_gifts');
  add_action('manage_se_gift_posts_custom_column', 'cpt_column_content_se_gifts');
}

function add_cpt_columns_se_gifts ( $columns ) {
  return array_merge( $columns, array(
    'amount' => 'Amount'
  ));
}

function cpt_column_content_se_gifts ( $column ) {
  global $post;

  switch ( $column ) {
    case 'amount':
      echo money_format('$%n', ( get_field( 'amount', $post->ID ) ) );
      break;

    default:
      break;
  }
}

/*
  Helpers
*/

function create_donation ( $name_first, $name_last, $email, $amount, $zip ) {

  global $se_field_keys;

  $donation = wp_insert_post( array(
    'post_name' => md5(microtime(true)),
    'post_title' => sanitize_text_field( $name_first ) . ' ' . sanitize_text_field( $name_last ),
    'post_type' => 'se_gift',
    'post_status' => 'publish',
    'ping_status' => 'closed'
  ));

  update_field( $se_field_keys['give_email'], $email, $donation );
  update_field( $se_field_keys['give_amount'], ( $amount / 100 ), $donation );
  update_field( $se_field_keys['give_zip'], $zip, $donation );

  return $donation;
}