<? /* Events */

function add_cpt_events ( ) { 

  register_post_type('se_event', array(
    'label' => "Events",
    'labels' => array(  
      'name' => 'Events',
      'singular_name' => 'Event',
      'menu_name' => 'Events',
      'name_admin_bar' => 'Event',
      'all_items' => 'All Events',
      'add_new' => 'New Event',
      'add_new_item' => 'Create New Event',
      'edit_item' => 'Edit Event',
      'new_item' => 'New Event',
      'view_item' => 'View Event',
      'search_items' => 'Search Events',
      'not_found' => 'No Events Found',
      'not_found_in_trash' => 'No Events Found in Trash'
    ),
    'description' => 'Events are added to a feed and display in a unique way, but aren\'t sortable.',
    'public' => true,
    'menu_position' => 43,
    'menu_icon' => 'dashicons-calendar',
    'hierarchical' => false,
    'supports' => array('title', 'editor', 'excerpt'),
    'has_archive' => 'events',
    'rewrite' => array(
      'slug' => 'events'
    )
  ));

  add_filter('manage_se_event_posts_columns' , 'add_cpt_columns_se_events');
  add_action('manage_se_event_posts_custom_column', 'cpt_column_content_se_events');
}

function add_cpt_columns_se_events ( $columns ) {
  return array_merge( $columns, array(
    'event_date' => 'Event Date',
    'host' => 'Host'
  ));
}

function cpt_column_content_se_events ( $column ) {

  switch ( $column ) {
    case 'event_date':
      the_field( 'date_start', $post->ID );
      break;

    case 'host':
      the_field( 'host', $post->ID );
      break;

    default:
      break;
  }
}
