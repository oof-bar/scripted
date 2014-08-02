<? /* Projects */

function add_cpt_aggregator ( ) {

  # unregister_post_type('post');

  register_post_type('se_aggregator', array(
    'label' => 'Feed Aggregator',
    'labels' => array(
      'name' => 'Updates',
      'singular_name' => 'Update',
      'menu_name' => 'Posts'
    ),
    'description' => 'A hacky implementation of a custom archive of multiple post types.',
    'public' => true,
    'show_ui' => true,
    'show_in_nav_menus' => true,
    'show_in_menu' => false,
    'hierarchical' => false,
    'supports' => array(),
    'has_archive' => 'updates',
    'rewrite' => array(
      'slug' => 'updates'
    )
  ));
}