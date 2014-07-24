<? /* Projects */

function add_cpt_news ( ) {

  # unregister_post_type('post');

  register_post_type('se_news', array(
    'label' => "News",
    'labels' => array(  
      'name' => 'News',
      'singular_name' => 'News Item',
      'menu_name' => 'News',
      'name_admin_bar' => 'News',
      'all_items' => 'All News Items',
      'add_new' => 'New News Post',
      'add_new_item' => 'Add New Item',
      'edit_item' => 'Edit News Item',
      'new_item' => 'New News Post',
      'view_item' => 'View New',
      'search_items' => 'Search News',
      'not_found' => 'No News Items Found',
      'not_found_in_trash' => 'No News Items Found in Trash'
    ),
    'description' => 'A replacement for the traditional "Post" feature in Wordpress.',
    'public' => true,
    'menu_position' => 40,
    'menu_icon' => 'dashicons-admin-post',
    'hierarchical' => false,
    'supports' => array('title', 'excerpt', 'editor', 'tags'),
    'has_archive' => 'news',
    'rewrite' => array(
      'slug' => 'news'
    )
  ));

  # add_filter('manage_se_news_posts_columns' , 'add_cpt_columns_se_news');

}

function add_cpt_columns_se_news ( ) {

}

if ( ! function_exists( 'unregister_post_type' ) ) {
  function unregister_post_type( $post_type ) {
      global $wp_post_types;
      if ( isset( $wp_post_types[ $post_type ] ) ) {
          unset( $wp_post_types[ $post_type ] );
          return true;
      }
      return false;
  }
}