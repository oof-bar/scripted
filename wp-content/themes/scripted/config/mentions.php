<? /* Media Pingback */

function add_cpt_pingbacks ( ) {

  register_post_type('se_mention', array(
    'label' => "Recognition",
    'labels' => array(  
      'name' => 'Recognition',
      'singular_name' => 'Mention',
      'menu_name' => 'Recognition',
      'name_admin_bar' => 'Recognition',
      'all_items' => 'All Recognition',
      'add_new' => 'Add Recognition',
      'add_new_item' => 'Add New Item',
      'edit_item' => 'Edit Item',
      'new_item' => 'New Item',
      'view_item' => 'View Item',
      'search_items' => 'Search Recognition',
      'not_found' => 'No Items Found',
      'not_found_in_trash' => 'No Items Found in Trash'
    ),
    'description' => 'References to media mentions should be added here, not on the blog. These posts don\'t contain body text, they simply link to the article on the external media source.',
    'public' => true,
    'menu_position' => 50,
    'menu_icon' => 'dashicons-share-alt',
    'hierarchical' => false,
    'supports' => array('title', 'tags'),
    'has_archive' => 'recognition',
    'rewrite' => array(
      'slug' => 'recognition'
    ),
    'taxonomies' => array('tags')
  ));

  # add_filter('manage_se_pingbacks_posts_columns' , 'add_cpt_columns_se_pingbacks');

}

function add_cpt_columns_se_pingbacks ( ) {

}