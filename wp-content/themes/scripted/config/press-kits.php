<? /* Press Kits */

function add_cpt_press_kits ( ) {

  register_post_type('se_press_kit', array(
    'label' => "Press Kit",
    'labels' => array(  
      'name' => 'Press Kit',
      'singular_name' => 'Press Kit',
      'menu_name' => 'Press Kits',
      'name_admin_bar' => 'Press Kit',
      'all_items' => 'All Press Kits',
      'add_new' => 'Add Press Kit',
      'add_new_item' => 'Add New Press Kit',
      'edit_item' => 'Edit Press Kit',
      'new_item' => 'New Press Kit',
      'view_item' => 'View Press Kit',
      'search_items' => 'Search References',
      'not_found' => 'No References Found',
      'not_found_in_trash' => 'No References Found in Trash'
    ),
    'description' => 'Downloadable press resources and media kits ought to be added here.',
    'public' => true,
    'menu_position' => 50,
    'menu_icon' => 'dashicons-admin-site',
    'hierarchical' => false,
    'supports' => array('title'),
    'has_archive' => 'press-kits',
    'rewrite' => array(
      'slug' => 'press-kits'
    )
  ));

  # add_filter('manage_se_press_kit_posts_columns' , 'add_cpt_columns_se_press_kit');

}

function add_cpt_columns_se_press_kit ( $columns ) {

}