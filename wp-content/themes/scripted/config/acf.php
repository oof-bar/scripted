<? 

/* 
  ACF Additional Features
*/

  # Hook before saving post.
  # Deprecated, July 22, in favor of using Google Forms.

  function se_acf_pre_save_post( $post_id ) {
    // check if this is to be a new post
    if ( $post_id != 'new_post' ) {
      return $post_id;
    }

    print_r($_POST);
    die;

    switch ( $post_id ) {

    case 'new_volunteer' :
      // Create a new post
      $post = array(
        'post_status'  => 'draft',
        'post_title'  => 'Title!',
        'post_type'  => 'se_volunteer'
      );
     
      // insert the post
      $post_id = wp_insert_post( $post ); 
     
      // update $_POST['return']
      $_POST['return'] = add_query_arg( array('post_id' => $post_id), $_POST['return'] );
      break;

    default:
      $post_id = false;
      break;

    }
    
    // return the new ID
    return $post_id;
  }
   
  # add_filter('acf/pre_save_post' , 'se_acf_pre_save_post' );


  # Register Options Page

  if ( function_exists("acf_add_options_page") ) {
    acf_add_options_page( array(
      'page_title' => 'Site Options',
      'menu_slug' => 'se_site_options'
    ));
  }
