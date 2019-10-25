<?php

add_action( 'wp_enqueue_scripts', 'ins2019_enqueue_styles' );
function ins2019_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array(), '1.1');
    //wp_enqueue_style( 'tm2-style', get_theme_file_uri() . '/tm2.css', array(), '1.1');
		wp_deregister_script( 'twentynineteen-priority-menu');
		wp_register_script( 'twentynineteen-priority-menu', get_theme_file_uri( '/js/priority-menu.js' ), array(), '1.1', true );
		wp_deregister_script( 'twentynineteen-touch-navigation');
		wp_register_script( 'twentynineteen-touch-navigation', get_theme_file_uri( '/js/touch-keyboard-navigation.js' ), array(), '1.3', true );
}
 

add_action( 'after_setup_theme', 'ins2019_after_setup_theme', 11 ); 
function ins2019_after_setup_theme() {

    /**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	remove_theme_support( 'custom-logo');
	add_theme_support( 'custom-logo');
}

/**
 * Enhance the theme by hooking into WordPress.
 */
//require get_stylesheet_directory()  . '/inc/template-functions.php';


// Callback function to filter the MCE settings
add_filter( 'tiny_mce_before_init', 'ins2019_mce_before_init_insert_formats' );  
function ins2019_mce_before_init_insert_formats( $settings ) { 
	$settings['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 18px 20px 22px 24px 26px 28px 32px 36px";
	return $settings;
} 


function ins2019_the_title( $before = '', $after = '', $echo = true ) {
	$title = ins2019_get_the_title();

	if ( strlen( $title ) == 0 ) {
		return;
	}

	$title = $before . $title . $after;

	if ( $echo ) {
		echo $title;
	} else {
		return $title;
	}
}


function ins2019_get_the_title(){
	global $post;
	$title= get_post_meta( $post->ID, 'Title', true);
	if( !$title){ $title= get_the_title();}
	return $title;
}


function ins2019_scripts() {
	?>
	<script>

		function noop(){
			
			function addClass(el, cls) {
				if ( ! el.className.match( '(?:^|\\s)' + cls + '(?!\\S)') ) {
					el.className += ' ' + cls;
				}
			}

			function deleteClass(el, cls) {
				el.className = el.className.replace( new RegExp( '(?:^|\\s)' + cls + '(?!\\S)' ),'' );
			}

			function getCurrentParent( child, selector, stopSelector ) {
				var currentParent = null;
				while ( child ) {
					if ( child.matches(selector) ) {
						currentParent = child;
						break;
					} else if ( stopSelector && child.matches(stopSelector) ) {
						break;
					}
					child = child.parentElement;
				}
				return currentParent;
			}

			document.addEventListener('touchstart', function(event) {

				var button;

				// Check if .submenu-expand is touched
				if ( event.target.matches('.submenu-expand') ) {
					button= event.target;

				// Check if child of .submenu-expand is touched
				} else if ( null != getCurrentParent( event.target, '.submenu-expand' ) &&
									getCurrentParent( event.target, '.submenu-expand' ).matches( '.submenu-expand' ) ) {
					button= getCurrentParent( event.target, '.submenu-expand' );
				}
				if( null != button){
					deleteClass( button, 'submenu-expand');
					addClass( button, 'menu-item-link-return');

				// Check if .menu-item-link-return is touched
				} else {
					if ( event.target.matches('.menu-item-link-return') ) {
						button= event.target;

					// Check if child of .menu-item-link-return is touched
					} else if ( null != getCurrentParent( event.target, '.menu-item-link-return' ) && getCurrentParent( event.target, '.menu-item-link-return' ).matches( '.menu-item-link-return' ) ) {
						button= getCurrentParent( event.target, '.menu-item-link-return' );
					}

					if( null != button){
						deleteClass( button, 'menu-item-link-return');
						addClass( button, 'submenu-expand');
					}
				}

			}, false);
			
		}

	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'ins2019_scripts' );
