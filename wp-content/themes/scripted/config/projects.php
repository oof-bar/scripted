<? /* Projects */

function add_cpt_projects ( ) {

  register_post_type('se_projects', array(
    'label' => "Student Projects",
    'labels' => array(  
      'name' => 'Student Projects',
      'singular_name' => 'Project',
      'menu_name' => 'Projects',
      'name_admin_bar' => 'Project',
      'all_items' => 'All Projects',
      'add_new' => 'New Project',
      'add_new_item' => 'Create New Project',
      'edit_item' => 'Edit Project',
      'new_item' => 'New Project',
      'view_item' => 'View Project',
      'search_items' => 'Search Projects',
      'not_found' => 'No Projects Found',
      'not_found_in_trash' => 'No Projects Found in Trash'
    ),
    'description' => 'A place to share student projects. Currently under development.',
    'public' => true,
    'menu_position' => 40,
    'menu_icon' => 'dashicons-analytics',
    'hierarchical' => false,
    'supports' => array('title', 'excerpt'),
    'has_archive' => 'projects',
    'rewrite' => array(
      'slug' => 'projects'
    )
  ));

  # add_filter('manage_se_projects_posts_columns' , 'add_cpt_columns_se_projects');

}

function add_cpt_columns_se_projects ( ) {

}