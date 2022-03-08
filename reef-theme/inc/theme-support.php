<?php
//
// Theme Support
//
// @package      reef-theme
// @author       Daniël R.
// @since        1.0.0
//
// TODO: block-templates uitzetten als we die niet gebruiken

// Theme support voor de kleuren staat in editor-options.php

//
// Registreer en laad hier je Wordpress functionaliteit
// https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/
//
if ( ! function_exists( 'reef_setup' ) ) :

    //
    // Deze functie wordt 'gehooked' in in de after_setup_theme hook. Deze gaat voor de init hook. 
    // Dit omdat de init hook voor bvepaalde eigenschappen (post-thumbnails bijvoorbeeld) te laat komt.
    // https://wordpress.stackexchange.com/questions/14797/difference-between-after-setup-theme-and-init-action-hooks
    // https://codex.wordpress.org/Plugin_API/Action_Reference
    //

    function reef_setup() {
        
        // Pad voor vertalingen
        load_theme_textdomain( 'reef-theme', get_template_directory() . '/languages' );

        // Editor Styles
        add_theme_support( 'editor-styles' );
        
        // Admin Bar Styling
        add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        // Body open hook
        add_theme_support( 'body-open' );

        // Wordpress verzorgt de title tags i.p.v dat we ze er zelf inzetten.
        add_theme_support( 'title-tag' );

        //
        // Mogelijkheid voor plaatjes bij posts en pages
        // https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        //
        add_theme_support( 'post-thumbnails' );

        //
        // Menu's registreren
        //
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary Navigation Menu', 'reef-theme' ),
            'secondary' => esc_html__( 'Secondary Navigation Menu', 'reef-theme' ),
        ) );

        //
        // HTML 5 support voor search, comments, gallerij en captions
        //
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Responsive embeds
        add_theme_support( 'responsive-embeds' );

        // Wide Images
        add_theme_support( 'align-wide' );
        
        //Block styles
        add_theme_support('wp-block-styles');

        // Block templates
        add_theme_support('block-templates');

        }
endif;
add_action( 'after_setup_theme', 'reef_setup' );
?>