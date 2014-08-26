<? /* Narratives */

function get_narrative_section ( $layout ) {
  return ( get_template_directory() . '/narrative-layouts/' . $layout . '.php' );
}

# Set and Get Narrative Field Cache with the Transient API

function get_narrative_fields ( $narrative ) {
  if ( $fields = get_transient( get_narrative_cache_name( $narrative->ID ) ) ) {
    # echo "<!-- Narrative was cached! -->";
    # pp($fields);
  } else {
    # echo "<!-- Retrieving with ACF... -->";
    $fields = get_fields( $narrative->ID );
    set_transient( get_narrative_cache_name( $narrative->ID ), $fields );
  }
  return $fields;
}

function clean_narrative_fields ( $post ) {
  if ( ( get_post_type($post) == 'page' ) && ( get_page_template_slug( $post ) == 'narrative.php' ) ) {
    delete_transient( get_narrative_cache_name($post) );
    get_narrative_fields( $post );
  }
}

# Abstract the building of the transient name
function get_narrative_cache_name ( $narrative ) {
  return ( 'narrative_' . $narrative );
}

add_action('save_post', 'clean_narrative_fields');


/*
// Deprecated Custom Post Type (Now a Page Template)

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
  # ?
}
*/