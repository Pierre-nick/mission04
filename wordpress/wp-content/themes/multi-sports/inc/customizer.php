<?php
/**
 * Multi Sports: Customizer
 *
 * @subpackage Multi Sports
 * @since 1.0
 */

use WPTRT\Customize\Section\Multi_Sports_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Multi_Sports_Button::class );

	$manager->add_section(
		new Multi_Sports_Button( $manager, 'multi_sports_pro', [
			'title'       => __( 'Multi Sports Pro', 'multi-sports' ),
			'priority'    => 0,
			'button_text' => __( 'Go Pro', 'multi-sports' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/products/sports-wordpress-theme/', 'multi-sports')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'multi-sports-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'multi-sports-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function multi_sports_customize_register( $wp_customize ) {

	$wp_customize->add_panel( 'multi_sports_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'multi-sports' ),
	    'description' => __( 'Description of what this panel does.', 'multi-sports' ),
	) );

	$wp_customize->add_section( 'multi_sports_theme_options_section', array(
    	'title'      => __( 'General Settings', 'multi-sports' ),
		'priority'   => 30,
		'panel' => 'multi_sports_panel_id'
	) );

	$wp_customize->add_setting('multi_sports_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'multi_sports_sanitize_choices'	        
	));
	$wp_customize->add_control('multi_sports_theme_options',array(
        'type' => 'radio',
        'label' => __('Do you want this section','multi-sports'),
        'section' => 'multi_sports_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','multi-sports'),
            'Right Sidebar' => __('Right Sidebar','multi-sports'),
            'One Column' => __('One Column','multi-sports'),
            'Three Columns' => __('Three Columns','multi-sports'),
            'Four Columns' => __('Four Columns','multi-sports'),
            'Grid Layout' => __('Grid Layout','multi-sports')
        ),
	));

	//Topbar section
	$wp_customize->add_section( 'multi_sports_social_icons' , array(
    	'title'      => __( 'Social Icons', 'multi-sports' ),
		'priority'   => null,
		'panel' => 'multi_sports_panel_id'
	) );

	$wp_customize->add_setting('multi_sports_facebook',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('multi_sports_facebook',array(
		'label'	=> __('Add Facebook Link','multi-sports'),
		'section'	=> 'multi_sports_social_icons',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('multi_sports_twitter',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('multi_sports_twitter',array(
		'label'	=> __('Add Twitter Link','multi-sports'),
		'section'	=> 'multi_sports_social_icons',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('multi_sports_linkedin',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('multi_sports_linkedin',array(
		'label'	=> __('Add Linkedin Link','multi-sports'),
		'section'	=> 'multi_sports_social_icons',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('multi_sports_rss',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('multi_sports_rss',array(
		'label'	=> __('Add RSS Link','multi-sports'),
		'section'	=> 'multi_sports_social_icons',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('multi_sports_youtube',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('multi_sports_youtube',array(
		'label'	=> __('Add Youtube Link','multi-sports'),
		'section'	=> 'multi_sports_social_icons',
		'type'		=> 'url'
	));

	//home page slider
	$wp_customize->add_section( 'multi_sports_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'multi-sports' ),
		'priority'   => null,
		'panel' => 'multi_sports_panel_id'
	) );

	$wp_customize->add_setting('multi_sports_slider_hide_show',array(
       	'default' => false,
       	'sanitize_callback'	=> 'multi_sports_sanitize_checkbox'
	));
	$wp_customize->add_control('multi_sports_slider_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide slider','multi-sports'),
	   	'section' => 'multi_sports_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'multi_sports_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'multi_sports_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'multi_sports_slider' . $count, array(
			'label' => __( 'Select Slide Image Page', 'multi-sports' ),
			'description' => __('Image Size (950px 500px)', 'multi-sports'),
			'section' => 'multi_sports_slider_section',
			'type' => 'dropdown-pages'
		) );
	}

	// Services Section 
	$wp_customize->add_section('multi_sports_services_section',array(
		'title'	=> __('Services Section','multi-sports'),
		'description'=> __('This section will appear below the Slider section.','multi-sports'),
		'panel' => 'multi_sports_panel_id',
	));

	$wp_customize->add_setting('multi_sports_service_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multi_sports_service_title',array(
		'label'	=> __('Section Title','multi-sports'),
		'section'	=> 'multi_sports_services_section',
		'type'		=> 'text'
	));
	
	$wp_customize->add_setting( 'multi_sports_services_page', array(
		'default'           => '',
		'sanitize_callback' => 'multi_sports_sanitize_dropdown_pages'
	));
	$wp_customize->add_control( 'multi_sports_services_page', array(
		'label'    => __( 'Select Service Page', 'multi-sports' ),
		'section'  => 'multi_sports_services_section',
		'type'     => 'dropdown-pages'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	foreach($categories as $category){
	if($i==0){
	$default = $category->slug;
	$i++;
	}
	$cats[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('multi_sports_services_cat',array(
		'default'	=> 'select',
		'sanitize_callback' => 'multi_sports_sanitize_choices',
	));
	$wp_customize->add_control('multi_sports_services_cat',array(
		'type'    => 'select',
		'choices' => $cats,
		'label' => __('Select Category to display Services Post','multi-sports'),
		'section' => 'multi_sports_services_section',
	));

	//Footer
    $wp_customize->add_section( 'multi_sports_footer', array(
    	'title'      => __( 'Footer Text', 'multi-sports' ),
		'priority'   => null,
		'panel' => 'multi_sports_panel_id'
	) );

    $wp_customize->add_setting('multi_sports_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multi_sports_footer_copy',array(
		'label'	=> __('Footer Text','multi-sports'),
		'section'	=> 'multi_sports_footer',
		'setting'	=> 'multi_sports_footer_copy',
		'type'		=> 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'multi_sports_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'multi_sports_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'multi_sports_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'multi_sports_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'multi-sports' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'multi-sports' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'multi_sports_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'multi_sports_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'multi_sports_customize_register' );

function multi_sports_customize_partial_blogname() {
	bloginfo( 'name' );
}

function multi_sports_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function multi_sports_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function multi_sports_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}