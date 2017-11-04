<? namespace ScriptEd;

class Initializers {
  public static function create_post_types() {
    # Donations
    PostTypes::create(
      'se_gift',
      'Gift',
      'Gifts',
      [
        'description' => 'A gift is a successful charge to a credit card. We capture a few bits of info about the donor and save them here.',
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'query_var' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'menu_position' => 52,
        'menu_icon' => 'dashicons-awards',
        'hierarchical' => false,
        'supports' => ['title'],
        'has_archive' => false,
        'rewrite' => [
          'slug' => 'donation',
          'pages' => false
        ]
      ]
    );

    # Events
    PostTypes::create(
      'se_event',
      'Event',
      'Events',
      [
        'description' => 'Events are added to a feed and display in a unique way, but aren’t sortable.',
        'public' => true,
        'menu_position' => 43,
        'menu_icon' => 'dashicons-calendar',
        'hierarchical' => false,
        'supports' => ['title', 'editor', 'excerpt'],
        'has_archive' => 'events',
        'rewrite' => [
          'slug' => 'events'
        ]
      ]
    );

    # Student Voices
    PostTypes::create(
      'se_student_voice',
      'Student Voice',
      'Student Voices',
      [
        'labels' => [
          'name' => 'Student Voices',
          'singular_name' => 'Student Voice',
          'menu_name' => 'Student Voices',
          'name_admin_bar' => 'Student Voice',
          'all_items' => 'All Posts',
          'add_new' => 'New Post',
          'add_new_item' => 'Create New Post',
          'edit_item' => 'Edit Post',
          'new_item' => 'New Post',
          'view_item' => 'View Post',
          'search_items' => 'Search Voices',
          'not_found' => 'No Posts Found',
          'not_found_in_trash' => 'No Posts Found in Trash'
        ],
        'description' => 'A place to share student posts.',
        'public' => true,
        'menu_position' => 41,
        'menu_icon' => 'dashicons-welcome-learn-more',
        'hierarchical' => false,
        'supports' => ['title', 'excerpt', 'editor'],
        'has_archive' => 'student-voice',
        'rewrite' => [
          'slug' => 'student-voice'
        ]
      ]
    );

    # Resource Posts
    PostTypes::create(
      'se_resource',
      'Resource',
      'Resources',
      [
        'description' => 'Alongside normal blog entries and events, educational resources will be available.',
        'public' => true,
        'menu_position' => 42,
        'menu_icon' => 'dashicons-portfolio',
        'hierarchical' => false,
        'supports' => ['title', 'excerpt', 'editor'],
        'has_archive' => 'resources',
        'rewrite' => [
          'slug' => 'resources'
        ]
      ]
    );

    # Feed Aggregation
    PostTypes::create(
      'se_aggregator',
      'Update',
      'Updates',
      [
        'description' => 'A hacky implementation of a custom archive of multiple post types.',
        'public' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'show_in_menu' => false,
        'hierarchical' => false,
        'supports' => [],
        'has_archive' => 'updates',
        'rewrite' => [
          'slug' => 'updates'
        ]
      ]
    );

    # "Pingbacks" or Media Mentions
    PostTypes::create(
      'se_mention',
      'Media Mention',
      'Recognition',
      [
        'labels' => [  
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
        ],
        'description' => 'References to media mentions should be added here, not on the blog. These posts don\'t contain body text, they simply link to the article on the external media source.',
        'public' => true,
        'menu_position' => 50,
        'menu_icon' => 'dashicons-share-alt',
        'hierarchical' => false,
        'supports' => ['title', 'tags'],
        'has_archive' => 'recognition',
        'rewrite' => [
          'slug' => 'recognition'
        ],
        'taxonomies' => ['tags']
      ]
    );
    
    # Press Kits
    PostTypes::create(
      'se_report',
      'Annual Report',
      'Annual Reports',
      [
        'description' => 'Annual reports ought to be added here.',
        'public' => true,
        'menu_position' => 51,
        'menu_icon' => 'dashicons-analytics',
        'hierarchical' => false,
        'supports' => ['title'],
        'has_archive' => 'annual-reports',
        'rewrite' => [
          'slug' => 'annual-reports'
        ]
      ]
    );
  }

  public static function override_post_types() {
    # Override Posts
    PostTypes::create(
      'post',
      'Post',
      'News',
      [
        'rewrite' => ['slug' => 'news'],
        'label' => 'News',
        'has_archive' => 'news',
        '_builtin' => false,
        'show_in_nav_menus' => true,
        'publicaly_queryable' => true,
        'labels' => [
          'name' => 'News',
          'singular_name' => 'News',
          'menu_name' => 'News Posts',
          'name_admin_bar' => 'News Posts',
          'all_items' => 'All Posts',
          'add_new' => 'New Post',
          'add_new_item' => 'Add New Post',
          'edit_item' => 'Edit Post',
          'new_item' => 'New Post',
          'view_item' => 'View Post',
          'search_items' => 'Search Posts',
          'not_found' => 'No Posts Found',
          'not_found_in_trash' => 'No Posts Found in Trash'
        ]
      ]
    );
  }

  public static function register_menus() {
    # Header
    register_nav_menu('primary', 'Header Navigation Menu');

    # Blog Sections
    register_nav_menu('blog', 'Blog Sidebar');

    # Press Sections
    register_nav_menu('press', 'Press Information Sidebar');

    # Team
    register_nav_menu('team', 'Team Sidebar');

    # Footer (Primary)
    register_nav_menu('footer_primary', 'Footer (Primary)');

    # Footer (Secondary)
    register_nav_menu('footer_secondary', 'Footer (Secondary)');

    # Mobile
    register_nav_menu('mobile', 'Mobile Drawer');
  }

  public static function create_thumbnail_versions() {
    add_image_size('jumbo', 1650, 1650, false);
  }

  public static function register_options_pages() {
    if ( function_exists('acf_add_options_page') ) {
      acf_add_options_page([
        'page_title' => 'Site Options',
        'menu_title'  => 'Options',
        'menu_slug' => 'se_site_options',
        'redirect' => false
      ]);
      
      acf_add_options_sub_page([
        'page_title'  => 'Notifications',
        'menu_title'  => 'Notifications ',
        'parent_slug' => 'se_site_options',
      ]);
    }
  }

  public static function create_taxonomies() {}
}
