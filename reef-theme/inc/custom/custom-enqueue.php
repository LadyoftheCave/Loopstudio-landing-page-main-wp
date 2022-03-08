<?php
//
// Custom | Enqueue
//
// @package      reef-theme
// @author       Daniël R.
// @since        1.0.0
//

// TODO: custom laden als child theme niet geladen is.

// Lage prio voor check op child-theme-css
function slick() {
    wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/assets/js/slick/slick.css', array() );
    wp_enqueue_style( 'slick-theme-css', get_template_directory_uri() . '/assets/js/slick/slick-theme.css', array() );
    wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/assets/js/slick/slick.js', array( 'jquery' ), '1.5.3', true );
    wp_enqueue_script( 'slick-init',  get_template_directory_uri() . '/assets/js/slick/slick-init.js', array( 'slick-js' ), '1.0.0', true );
}
// add_action( 'wp_enqueue_scripts', 'slick',50);

function reef_scripts() {

   
    if(!wp_style_is('css-reef-theme-main')) {
        wp_enqueue_style( 'css-reef-theme-main', get_template_directory_uri() . '/assets/css/main.css', array(), filemtime( get_template_directory() . '/assets/css/main.css' ) );
    }
	if(!wp_style_is('css-reef-theme-child')) {
        wp_enqueue_style( 'css-reef-theme-custom', get_template_directory_uri() . '/assets/css/custom.css', array(), filemtime( get_template_directory() . '/assets/css/custom.css' ) );
    }
    
    wp_enqueue_script( 'js-reef-theme-main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), filemtime( get_template_directory() . '/assets/js/main.js' ), true );

    if( ! is_admin() ) {
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
        wp_enqueue_script( 'jquery' );
    }


}
add_action( 'wp_enqueue_scripts', 'reef_scripts',99);

/* Editor styles */
function reef_editor_styles () {
    add_editor_style( 'assets/css/main.css' );
}
add_action( 'after_setup_theme', 'reef_editor_styles', 10);