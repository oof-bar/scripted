<? 

/* 
  ACF Additional Features
*/

  function se_acf_pre_save_post( $post_id ) {
    // check if this is to be a new post
    if ( $post_id != 'new_post' ) {
      return $post_id;
    }

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
   
  add_filter('acf/pre_save_post' , 'se_acf_pre_save_post' );