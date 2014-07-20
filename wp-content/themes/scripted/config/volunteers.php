<? /* Application */

function add_cpt_volunteer_applications ( ) {

  register_post_type('se_volunteer', array(
    'label' => "Volunteer Application",
    'labels' => array(  
      'name' => 'Volunteer Applications',
      'singular_name' => 'Volunteer Application',
      'menu_name' => 'Volunteer Applications',
      'name_admin_bar' => 'Volunteers',
      'all_items' => 'All Applications',
      'add_new' => 'New Volunteer Application',
      'add_new_item' => 'Create New Application',
      'edit_item' => 'Edit Application',
      'new_item' => 'New Application',
      'view_item' => 'View Application',
      'search_items' => 'Search Applications',
      'not_found' => 'No Volunteer Applications Found',
      'not_found_in_trash' => 'No Applications Found in Trash'
    ),
    'description' => 'Roll-your-own front-end form for volunteer applicants',
    'public' => false,
    'publicaly_queryable' => false,
    'query_var' => false,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 60,
    'menu_icon' => 'dashicons-welcome-write-blog',
    'hierarchical' => false,
    'supports' => array('title'),
    'has_archive' => false
  ));

  # Hooks
  # add_filter('manage_se_volunteer_posts_columns' , 'add_cpt_columns_se_volunteers');
  # add_action('manage_se_volunteer_posts_custom_column', 'cpt_column_content_se_volunteers');

}

function add_cpt_columns_se_volunteers ( $columns ) {
  return array_merge( $columns, array(
    'sections' => 'Sections'
  ));
}

function cpt_column_content_se_volunteers ( ) {

}