<?php
//
// Widgets
//
// @package      reef-theme
// @author       Daniël R.
// @since        1.0.0
//


if ( ! function_exists( 'reef_register_widgets' ) ) :
    function reef_register_widgets() {
        register_sidebar( array(
            'name'              => esc_html__('primary-sidebar', 'reef-theme'),
            'id'                => 'primary-sidebar',
            'before_widget'     => '<div id="%1$s" class="widget %2$s">',
            'after_widget'      => '</div>',
            )
        );
        register_sidebar( array(
            'name'              => esc_html__('footer-1', 'reef-theme'),
            'id'                => 'footer-1',
            'before_widget'     => '<div id="%1$s" class="widget %2$s">',
            'after_widget'      => '</div>',
            )
        );
        register_sidebar( array(
            'name'              => esc_html__('footer-2', 'reef-theme'),
            'id'                => 'footer-2',
            'before_widget'     => '<div id="%1$s" class="widget %2$s">',
            'after_widget'      => '</div>',
            )
        );

    }
endif;

add_action( 'widgets_init', 'reef_register_widgets' );
?>