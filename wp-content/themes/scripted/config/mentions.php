<? /* Media Pingback */

function add_cpt_pingbacks ( ) {

  register_post_type('se_mention', array(
    'label' => "Media Mentions",
    'labels' => array(  
      'name' => 'Mentions',
      'singular_name' => 'Mention',
      'menu_name' => 'Mentions',
      'name_admin_bar' => 'Mention',
      'all_items' => 'All Media Mentions',
      'add_new' => 'Add Mentions',
      'add_new_item' => 'Add New Mentions',
      'edit_item' => 'Edit Mentions',
      'new_item' => 'New Mentions',
      'view_item' => 'View Mentions',
      'search_items' => 'Search References',
      'not_found' => 'No References Found',
      'not_found_in_trash' => 'No References Found in Trash',
      'parent_item_colon' => 'Expansion On: '
    ),
    'description' => 'References to media mentions should be added here, not on the blog. These posts don\'t contain body text, they simply link to the article on the external media source.',
    'public' => true,
    'menu_position' => 50,
    'menu_icon' => 'dashicons-share-alt',
    'hierarchical' => false,
    'supports' => array('title', 'tags'),
    'has_archive' => 'in-the-media',
    'rewrite' => array(
      'slug' => 'in-the-media'
    ),
    'taxonomies' => array('tags')
  ));

  # add_filter('manage_se_pingbacks_posts_columns' , 'add_cpt_columns_se_pingbacks');

}

function add_cpt_columns_se_pingbacks ( ) {

}