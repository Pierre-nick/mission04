<?php
    add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
    function enqueue_parent_styles() {
        wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
    }

    function register_child_theme_styles() {
        wp_register_style("style",get_stylesheet_uri());
        wp_enqueue_style("style");
    }
    add_action("wp_enqueue_scripts","register_child_theme_styles");
?>