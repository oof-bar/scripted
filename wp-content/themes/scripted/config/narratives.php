<? namespace ScriptEd;

class Narrative {
  public static function get_section ($layout) {
    return ( get_template_directory() . '/narrative-layouts/' . $layout . '.php' );
  }

  # Set and Get Narrative Field Cache with the Transient API
  public static function get_fields ($narrative) {
    if ( $fields = get_transient(static::get_cache_name($narrative->ID)) ) {
    } else {
      $fields = get_fields($narrative->ID);
      set_transient(static::get_cache_name($narrative->ID), $fields);
    }
    return $fields;
  }

  public static function clean ($post) {
    if ( (get_post_type($post) == 'page') && (get_page_template_slug($post) == 'narrative.php') ) {
      delete_transient(static::get_cache_name($post));
      static::get_fields(get_post($post));
    }
  }

  # Abstract the building of the transient name
  public static function get_cache_name ($narrative_id) {
    return 'narrative_' . $narrative_id;
  }
}
