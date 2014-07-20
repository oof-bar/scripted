<? /* Narratives */

function add_cpt_narratives ( ) {

  register_post_type('se_narrative', array(
    'label' => "Narratives",
    'labels' => array(  
      'name' => 'Narratives',
      'singular_name' => 'Narrative',
      'menu_name' => 'Narratives',
      'name_admin_bar' => 'Narrative',
      'all_items' => 'All Narratives',
      'add_new' => 'New Narrative',
      'add_new_item' => 'Create New Narrative',
      'edit_item' => 'Edit Narrative',
      'new_item' => 'New Narrative',
      'view_item' => 'View Narrative',
      'search_items' => 'Search Narratives',
      'not_found' => 'No Narratives Found',
      'not_found_in_trash' => 'No Narratives Found in Trash',
      'parent_item_colon' => 'Expansion On: '
    ),
    'description' => 'A page format that lends great flexibility for content to create compelling stories.',
    'public' => true,
    'menu_position' => 30,
    'menu_icon' => 'dashicons-feedback',
    'hierarchical' => true,
    'supports' => array('title', 'excerpt'),
    'has_archive' => false,
    'rewrite' => array(
      'slug' => '/',
      'with_front' => false
    )
  ));

  # Hooks
  add_filter('manage_se_narrative_posts_columns' , 'add_cpt_columns_se_narratives');
  add_action('manage_se_narrative_posts_custom_column', 'cpt_column_content_se_narratives');

}

function add_cpt_columns_se_narratives ( $columns ) {
  return array_merge( $columns, array(
    'sections' => 'Sections'
  ));
}

function cpt_column_content_se_narratives ( ) {

}