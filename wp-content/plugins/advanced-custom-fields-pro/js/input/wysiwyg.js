(function($){
	
	acf.fields.wysiwyg = {
		
		$field:		null,
		$textarea:	null,	
		settings:	{},
		toolbars:	{},
		
		focus: function( $field ){
			
			
			// $field may be an internal element
			if( !acf.is_field($field) ) {
				
				$field = acf.get_closest_field( $field );
				
			}
			
			
			// update vars
			this.$field = $field;
			this.$el = $field.find('.wp-editor-wrap');
			this.$textarea = this.$el.find('textarea');
			this.settings = acf.get_data( this.$el );
			
			
			// custom
			this.settings.id = this.$textarea.attr('id');
			
			
			// return this for chaining
			return this;
			
		},
		
		initialize: function(){
			
			// bail early if no tinymce
			if( typeof tinyMCEPreInit === 'undefined' ) {
				
				return false;
				
			}
			
			
			// vars
			var mceInit = this.get_mceInit(),
				qtInit = this.get_qtInit();
			
				
			// append settings
			tinyMCEPreInit.mceInit[ mceInit.id ] = mceInit;
			tinyMCEPreInit.qtInit[ qtInit.id ] = qtInit;
			
			
			// initialize mceInit
			if( this.$el.hasClass('tmce-active') ) {
				
				try {
					
					tinymce.init( mceInit );
					
				} catch(e){}
				
			}
			

			// initialize qtInit
			try {
				
				var qtag = quicktags( qtInit );
				
				this._buttonsInit( qtag );
				
			} catch(e){}
			
		},
		
		get_mceInit : function(){
			
			// reference
			var $field = this.$field;
				
				
			// vars
			var toolbar = this.get_toolbar( this.settings.toolbar ),
				mceInit = $.extend({}, tinyMCEPreInit.mceInit.acf_content);
			
			
			// selector
			mceInit.selector = '#' + this.settings.id;
			
			
			// id
			mceInit.id = this.settings.id; // tinymce v4
			mceInit.elements = this.settings.id; // tinymce v3
			
			
			// toolbar
			if( toolbar ) {
				
				var k = (tinymce.majorVersion < 4) ? 'theme_advanced_buttons' : 'toolbar';
				
				for( var i = 1; i < 5; i++ ) {
					
					mceInit[ k + i ] = acf.isset(toolbar, i) ? toolbar[i] : '';
					
				}
				
			}
			
			
			// events
			if( tinymce.majorVersion < 4 ) {
				
				mceInit.setup = function( ed ){
					
					ed.onInit.add(function(ed, event) {
						
						// focus
						$(ed.getBody()).on('focus', function(){
					
							acf.validation.remove_error( $field );
							
						});
						
						$(ed.getBody()).on('blur', function(){
							
							// update the hidden textarea
							// - This fixes a bug when adding a taxonomy term as the form is not posted and the hidden textarea is never populated!
			
							// save to textarea	
							ed.save();
							
							
							// trigger change on textarea
							$field.find('textarea').trigger('change');
							
						});
					
					});
					
				};
			
			} else {
			
				mceInit.setup = function( ed ){
					
					ed.on('focus', function(e) {
				
						acf.validation.remove_error( $field );
						
					});
					
					ed.on('blur', function(e) {
						
						// update the hidden textarea
						// - This fixes a but when adding a taxonomy term as the form is not posted and the hidden textarea is never populated!
		
						// save to textarea	
						ed.save();
						
						
						// trigger change on textarea
						$field.find('textarea').trigger('change');
						
					});
					
				};
			
			}
			
			
			// hook for 3rd party customization
			mceInit = acf.apply_filters('wysiwyg_tinymce_settings', mceInit, mceInit.id);
			
			
			// return
			return mceInit;
			
		},
		
		get_qtInit : function(){
				
			// vars
			var qtInit = $.extend({}, tinyMCEPreInit.qtInit.acf_content);
			
			
			// id
			qtInit.id = this.settings.id;
			
			
			// hook for 3rd party customization
			qtInit = acf.apply_filters('wysiwyg_quicktags_settings', qtInit, qtInit.id);
			
			
			// return
			return qtInit;
			
		},
		
		/*
		*  disable
		*
		*  This function will disable the tinymce for a given field
		*  Note: txtarea_el is different from $textarea.val() and is the value that you see, not the value that you save.
		*        this allows text like <--more--> to wok instead of showing as an image when the tinymce is removed
		*
		*  @type	function
		*  @date	1/08/2014
		*  @since	5.0.0
		*
		*  @param	n/a
		*  @return	n/a
		*/
		
		disable: function(){
			
			try {
				
				// vars
				var ed = tinyMCE.get( this.settings.id ),
					txtarea_el = tinyMCE.DOM.get( this.settings.id );
					val = txtarea_el.value;
					
				
				// destory
				ed.destroy();
				
				
				// update value
				if( this.$field.find('.wp-editor-wrap').hasClass('html-active') ) {
				
					txtarea_el.value = val;
				
				}

				
			} catch(e) {}
			
		},
		
		enable: function(){
			
			// bail early if html mode
			if( this.$field.find('.wp-editor-wrap').hasClass('html-active') ) {
				
				return;
				
			}
			
			
			try {
				
				tinyMCE.init( tinyMCEPreInit.mceInit[ this.settings.id ] );
				
			} catch(e) {}
			
			
		},
		
		get_toolbar : function( name ){
			
			// bail early if toolbar doesn't exist
			if( typeof this.toolbars[ name ] !== 'undefined' ) {
				
				return this.toolbars[ name ];
				
			}
			
			
			// return
			return false;
			
		},
		
		
		/*
		*  _buttonsInit
		*
		*  This function will add the quicktags HTML to a WYSIWYG field. Normaly, this is added via quicktags on document ready,
		*  however, there is no support for 'append'. Source: wp-includes/js/quicktags.js:245
		*
		*  @type	function
		*  @date	1/08/2014
		*  @since	5.0.0
		*
		*  @param	ed (object) quicktag object
		*  @return	n/a
		*/
		
		_buttonsInit: function( ed ) {
			var defaults = ',strong,em,link,block,del,ins,img,ul,ol,li,code,more,close,';
	
			canvas = ed.canvas;
			name = ed.name;
			settings = ed.settings;
			html = '';
			theButtons = {};
			use = '';

			// set buttons
			if ( settings.buttons ) {
				use = ','+settings.buttons+',';
			}

			for ( i in edButtons ) {
				if ( !edButtons[i] ) {
					continue;
				}

				id = edButtons[i].id;
				if ( use && defaults.indexOf( ',' + id + ',' ) !== -1 && use.indexOf( ',' + id + ',' ) === -1 ) {
					continue;
				}

				if ( !edButtons[i].instance || edButtons[i].instance === inst ) {
					theButtons[id] = edButtons[i];

					if ( edButtons[i].html ) {
						html += edButtons[i].html(name + '_');
					}
				}
			}

			if ( use && use.indexOf(',fullscreen,') !== -1 ) {
				theButtons.fullscreen = new qt.FullscreenButton();
				html += theButtons.fullscreen.html(name + '_');
			}


			if ( 'rtl' === document.getElementsByTagName('html')[0].dir ) {
				theButtons.textdirection = new qt.TextDirectionButton();
				html += theButtons.textdirection.html(name + '_');
			}

			ed.toolbar.innerHTML = html;
			ed.theButtons = theButtons;
			
		},
		
		add_actions: function(){
			
			// add actions
			acf.add_action('ready', this.on_ready);
			acf.add_action('append', this.on_append);
			acf.add_action('remove', this.on_remove);
			acf.add_action('sortstart', this.on_sortstart);
			acf.add_action('sortstop', this.on_sortstop);
					
		},
		
		on_ready : function( $el ){
			
			// move acf_content wysiwyg
			if( $('#wp-acf_content-wrap').exists() ) {
				
				$('#wp-acf_content-wrap').parent().appendTo('body');
				
			}
			
			acf.fields.wysiwyg.on_append( $el );
			
		},
		
		on_append: function( $el ){
			
			acf.get_fields({ type : 'wysiwyg'}, $el).each(function(){
				
				acf.fields.wysiwyg.focus( $(this) ).initialize();
			
			});
			
		},
		
		on_remove: function( $el ){
		
			acf.get_fields({ type : 'wysiwyg'}, $el).each(function(){
				
				acf.fields.wysiwyg.focus( $(this) ).disable();
				
			});
			
		},
		
		on_sortstart: function( $item, $placeholder ){
			
			acf.get_fields({ type : 'wysiwyg'}, $item).each(function(){
				
				acf.fields.wysiwyg.focus( $(this) ).disable();
				
			});
			
		},
		
		on_sortstop: function( $el ){
		
			acf.get_fields({ type : 'wysiwyg'}, $el).each(function(){
				
				acf.fields.wysiwyg.focus( $(this) ).enable();
				
			});
			
		}
		
	};
	
	
	// add actions
	acf.fields.wysiwyg.add_actions();		

})(jQuery);
