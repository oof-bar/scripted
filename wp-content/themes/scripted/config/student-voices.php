<? /* Projects */

function add_cpt_student_voice ( ) {

  register_post_type('se_student_voice', array(
    'label' => "Student Voices",
    'labels' => array(  
      'name' => 'Student Voices',
      'singular_name' => 'Student Voice',
      'menu_name' => 'Student Voices',
      'name_admin_bar' => 'Student Voice',
      'all_items' => 'All Posts',
      'add_new' => 'New Post',
      'add_new_item' => 'Create New Post',
      'edit_item' => 'Edit Post',
      'new_item' => 'New Post',
      'view_item' => 'View Post',
      'search_items' => 'Search Voices',
      'not_found' => 'No Posts Found',
      'not_found_in_trash' => 'No Posts Found in Trash'
    ),
    'description' => 'A place to share student posts.',
    'public' => true,
    'menu_position' => 41,
    'menu_icon' => 'dashicons-welcome-learn-more',
    'hierarchical' => false,
    'supports' => array('title', 'excerpt', 'editor'),
    'has_archive' => 'student-voice',
    'rewrite' => array(
      'slug' => 'student-voice'
    )
  ));

  # add_filter('manage_se_student_voices_posts_columns' , 'add_cpt_columns_se_student_voices');

}

function add_cpt_columns_se_student_voices ( ) {

}