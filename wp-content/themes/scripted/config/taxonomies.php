<? namespace ScriptEd;

class Taxonomies {
  public static function create($type, $singular, $plural, $on, $additional_options) {
    $default_options = [
      'labels' => static::labels($singular, $plural),
      'public' => true,
      'has_archive' => true
    ];

    $options = array_merge($default_options, $additional_options);

    register_taxonomy($type, $on, $options);
  }

  public static function labels($singular, $plural) {
    return [
      'name' => $plural,
      'singular_name' => $singular,
      'add_new_item' => 'Add New ' . $singular,
      'new_item' => 'New ' . $singular,
      'edit_item' => 'Edit ' . $singular,
      'view_item' => 'View ' . $singular,
      'all_items' => 'All ' . $plural,
      'search_items' => 'Search ' . $plural
    ];
}
