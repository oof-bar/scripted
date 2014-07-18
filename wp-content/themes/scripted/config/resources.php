<? /* Resources */

function add_cpt_resources ( ) {

  register_post_type('se_resource', array(
    'label' => "Resources",
    'labels' => array(  
      'name' => 'Resources',
      'singular_name' => 'Resource',
      'menu_name' => 'Resources',
      'name_admin_bar' => 'Resource',
      'all_items' => 'All Resources',
      'add_new' => 'New Resource',
      'add_new_item' => 'Create New Resource',
      'edit_item' => 'Edit Resource',
      'new_item' => 'New Resource',
      'view_item' => 'View Resource',
      'search_items' => 'Search Resources',
      'not_found' => 'No Resources Found',
      'not_found_in_trash' => 'No Resources Found in Trash'
    ),
    'description' => 'Alongside normal blog entries and events, educational resources will be available.',
    'public' => true,
    'menu_position' => 40,
    'menu_icon' => 'dashicons-portfolio',
    'hierarchical' => false,
    'supports' => array('title', 'excerpt', 'editor'),
    'has_archive' => 'resources',
    'rewrite' => array(
      'slug' => 'resources'
    )
  ));

  # add_filter('manage_se_resources_posts_columns' , 'add_cpt_columns_se_resources');

}

function add_cpt_columns_se_resources ( ) {

}