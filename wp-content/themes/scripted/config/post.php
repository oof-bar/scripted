<? /* Projects */

function add_cpt_post_override ( ) {

  unregister_post_type('post');

  register_post_type('post', array(
    'label' => "Post",
    'labels' => array(  
      'name' => 'Post',
      'singular_name' => 'Post',
      'menu_name' => 'Posts',
      'name_admin_bar' => 'Posts',
      'all_items' => 'All Posts',
      'add_new' => 'New Post',
      'add_new_item' => 'Add New Post',
      'edit_item' => 'Edit Post',
      'new_item' => 'New Post',
      'view_item' => 'View Post',
      'search_items' => 'Search Posts',
      'not_found' => 'No Posts Found',
      'not_found_in_trash' => 'No Posts Found in Trash'
    ),
    'public'  => true,
    '_builtin' => false, 
    '_edit_link' => 'post.php?post=%d', 
    'capability_type' => 'post',
    'map_meta_cap' => true,
    'hierarchical' => false,
    'has_archive' => 'news',
    'show_in_nav_menus' => true,
    'show_in_menu' => false,
    'hierarchical' => false,
    'menu_position' => 4,
    'rewrite' => array(
      'slug' => 'news'
    ),
    'query_var' => false,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'post-formats' ),
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