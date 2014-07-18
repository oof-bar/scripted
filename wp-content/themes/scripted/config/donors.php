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
    'public' => false,
    'publicaly_queryable' => false,
    'query_var' => false,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 60,
    'menu_icon' => 'dashicons-awards',
    'hierarchical' => false,
    'supports' => array('title'),
    'has_archive' => false,
    'rewrite' => array(
      'slug' => 'donations'
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

  switch ( $column ) {
    case 'amount':
      money_format('%', ( the_field( 'amount', $post->ID ) / 100 ) );
      break;

    default:
      break;
  }
}