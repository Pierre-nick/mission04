<?php


/*
To add custom PHP functions to the theme, create a child theme (https://themify.me/docs/child-theme) and add it to the child theme functions.php file. 
They will be added to the theme automatically.
*/

/* prevent update checks from wp.org repository */
add_theme_support( 'themify-exclude-theme-from-wp-update' );

/**
 * Load Google fonts used by the theme
 *
 * @return array
 */
function themify_theme_google_fonts( $fonts ) {
	/* translators: If there are characters in your language that are not supported by Old Standard, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Old Standard font: on or off', 'themify' ) ) {
		$fonts['old-standard-tt'] = 'Old+Standard+TT:400,400i,700';
	}

	return $fonts;
}
add_filter( 'themify_google_fonts', 'themify_theme_google_fonts' );


	///////////////////////////////////////
	// Enable WordPress feature image
	///////////////////////////////////////
	add_theme_support( 'post-thumbnails' );
		
	///////////////////////////////////////
	// Register Custom Menu Function
	///////////////////////////////////////
	function themify_register_custom_nav() {
		register_nav_menus( array(
			'main-nav' => __( 'Main Navigation', 'themify' ),
			'footer-nav' => __( 'Footer Navigation', 'themify' ),
		) );
	}
	
	// Register Custom Menu Function - Action
	add_action('after_setup_theme', 'themify_register_custom_nav');
	

