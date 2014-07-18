<?php 

class acf_wpml_compatibility {
	
	/*
	*  Constructor
	*
	*  This function will construct all the neccessary actions and filters
	*
	*  @type	function
	*  @date	23/06/12
	*  @since	3.1.8
	*
	*  @param	N/A
	*  @return	N/A
	*/
	
	function __construct() {
		
		// actions
		add_action('icl_make_duplicate',			array($this, 'icl_make_duplicate'), 10, 4);
		add_action('acf/field_group/admin_head',	array($this, 'admin_head'));
		add_action('acf/input/admin_head',			array($this, 'admin_head'));
		
		
		// filters
		add_filter('acf/settings/save_json',		array($this, 'settings_save_json'));
		add_filter('acf/settings/load_json',		array($this, 'settings_load_json'));
	}
	
	
	/*
	*  settings_save_json
	*
	*  description
	*
	*  @type	function
	*  @date	19/05/2014
	*  @since	5.0.0
	*
	*  @param	$post_id (int)
	*  @return	$post_id (int)
	*/
	
	function settings_save_json( $path ) {
		
		// remove trailing slash
		$path = untrailingslashit( $path );
		
		
		// ammend
		$path = $path . '/' . ICL_LANGUAGE_CODE;
		
		
		// make dir if does not exist
		if( !file_exists($path) ) {
			
			mkdir($path, 0777, true);
			
		}
		
		
		// return
		return $path;
		
	}
	
	
	/*
	*  settings_load_json
	*
	*  description
	*
	*  @type	function
	*  @date	19/05/2014
	*  @since	5.0.0
	*
	*  @param	$post_id (int)
	*  @return	$post_id (int)
	*/
	
	function settings_load_json( $paths ) {
		
		if( !empty($paths) ) {
			
			foreach( $paths as $i => $path ) {
				
				// remove trailing slash
				$path = untrailingslashit( $path );
				
				
				// ammend
				$paths[ $i ] = $path . '/' . ICL_LANGUAGE_CODE;
			
			}
		}
		
		
		// return
		return $paths;
		
	}
	
	
	
	/*
	*  icl_make_duplicate
	*
	*  description
	*
	*  @type	function
	*  @date	26/02/2014
	*  @since	5.0.0
	*
	*  @param	$post_id (int)
	*  @return	$post_id (int)
	*/
	
	function icl_make_duplicate( $master_post_id, $lang, $postarr, $id ) {
		
		// validate
		if( $postarr['post_type'] != 'acf-field-group' ) {
		
			return;
			
		}
		
		
		// duplicate field group
		acf_duplicate_field_group( $master_post_id, $id );
		

	}
	
	
	/*
	*  admin_head
	*
	*  description
	*
	*  @type	function
	*  @date	27/02/2014
	*  @since	5.0.0
	*
	*  @param	$post_id (int)
	*  @return	$post_id (int)
	*/
	
	function admin_head() {
		
		?>
		<script type="text/javascript">
				
		acf.add_filter('prepare_for_ajax', function( args ){
			
			if( typeof icl_this_lang != 'undefined' )
			{
				args.lang = icl_this_lang;
			}
			
			return args;
			
		});
		
		</script>
		<?php
		
	}
	
}

new acf_wpml_compatibility();

?>
