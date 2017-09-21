<? namespace ScriptEd;

class PostTypes {
  public static function create($type, $singular, $plural, $additional_options) {
    $default_options = [
      'label' => $singular,
      'labels' => static::labels($singular, $plural),
      'public' => true,
      'has_archive' => true
    ];
    $options = array_merge($default_options, $additional_options);

    static::destroy($type);
    register_post_type($type, $options);
  }

  # Helps generate pluralized labels
  public static function labels($singular, $plural) {
    return [
      'name' => $plural,
      'singular_name' => $singular,
      'menu_name' => $plural,
      'name_admin_bar' => $singular,
      'add_new_item' => 'Add New ' . $singular,
      'new_item' => 'New ' . $singular,
      'edit_item' => 'Edit ' . $singular,
      'view_item' => 'View ' . $singular,
      'all_items' => 'All ' . $plural,
      'search_items' => 'Search ' . $plural,
    ];
  }

  public static function destroy($type) {
    global $wp_post_types;
    if ( isset($wp_post_types[$type]) ) {
        unset($wp_post_types[$type]);
        return true;
    }
    return false;
  }

  public static function nicename ($type) {
    return get_post_type_object($type)->labels->name;
  }
}
