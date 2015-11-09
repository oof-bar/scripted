<? namespace ScriptEd;

use WP_Query,
    html,
    tpl,
    a;

class Helpers {
  public static function page_title ($post) {
    if ( is_singular('se_gift') ) {
      return 'Thanks!';
    } else if ( is_singular(['post', 'se_news', 'se_event', 'se_press_kit', 'se_student_voice', 'se_resource', 'se_mention']) ) {
      return html::span(html::a(get_post_type_archive_link($post->post_type), get_post_type_object($post->post_type)->labels->singular_name), ['class' => 'parent-page archive']) . html::span(get_the_title(), ['class' => 'subpage-title']);

      #return '<span class="parent-page archive"><a href="' . get_post_type_archive_link($post->post_type) . '">' . get_post_type_object($post->post_type)->labels->singular_name . '</a>:</span> <span class="subpage-title light">' . get_the_title() . '</span>';
    } else if ( is_archive() ) {
      return post_type_archive_title(null, false);
    } else if ( is_single() or is_page() ) {
      if ( count($ancestors = get_post_ancestors($post)) ) {
        $parent = a::first($ancestors);
        return '<span class="parent-page"><a href="' . get_permalink($parent) . '">' . get_the_title($parent) . '</a>:</span> <span class="subpage-title light">' . get_the_title() . '</span>';
      } else {
        return get_the_title();
      }
    } else if ( is_404() ) {
      return 'Oh no!';
    } else {
      return '';
    }
  }

  public static function breadcrumb ($page) {
    $tree = get_post_ancestors($page);
    if ( !count($tree) ) {
      # No parent pages. Get the children pages.
      $list = get_posts([
        'post_type' => 'page',
        'post_status' => 'publish',
        'post_parent' => $page->ID,
        'orderby' => 'menu_order'
      ]);

      # Prepend this page, because it won't be in the results.
      array_unshift($list, $page);
    } else {
      # There are parent pages.
      $list = get_posts([
        'post_type' => 'page',
        'post_status' => 'publish',
        'post_parent' => a::first($tree),
        'orderby' => 'menu_order'
      ]);

      # Prepend the parent page, because it won't be in the results.
      array_unshift($list, get_post(a::first($tree)));
    }
    return $list;
  }

  public static function page_menu ($page) {
    $tree = get_post_ancestors( $page );
    if ( !count( $tree ) ) {
      // No parent pages. Get the children pages.
      $list = get_posts( array(
        'post_type' => 'page',
        'post_status' => 'publish',
        'post_parent' => $page->ID,
        'orderby' => 'menu_order'
      ));
      # Prepend this page, because it won't be in the results.
      array_unshift($list, $page);
    } else {
      // There are parent pages.
      $list = get_posts( array(
        'post_type' => 'page',
        'post_status' => 'publish',
        'post_parent' => a::first($tree),
        'orderby' => 'menu_order'
      ));
      # Prepend the parent page, because it won't be in the results.
      array_unshift($list, get_post(a::first($tree)));
    }
    return $list;
  }

  public static function partial ($name, $data = []) {
    return tpl::load(get_template_directory() . '/partials/' . $name . '.php', $data);
  }

  public static function embed ($name, $version = '', $data = []) {
    return static::partial('/embed/' . ($version ? $version . '/' : '') . $name, $data);
  }

  public static function meta_tags () {
    if ( $tags = static::option('tags') ) {
      $tag_list = a::extract($tags, 'tag');
      return implode(',', $tag_list);
    }
  }

  public static function option ($option = false, $options_page = 'option') {
    $options = get_fields($options_page);
    if ( $option && isset($options[$option]) ) {
      return $options[$option];
    } else {
      return false;
    }
  }

  public static function last_post ($type = 'post') {
    return new WP_Query( array(
      'post_type' => $type,
      'posts_per_page' => 1,
      'orderby' => 'date',
      'order' => 'DESC'
    ));
  }
}
