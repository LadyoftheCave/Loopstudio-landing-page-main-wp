<?php
//
// Custom | Patterns
//
// @package      reef-theme
// @author       Daniël R.
// @since        1.0.0
//

register_block_pattern_category(
    'custom',
    [
        'label' => esc_html__( 'Custom Patterns', 'reef-theme' ),
    ]
);



function register_custom_block_patterns() {

    include( get_template_directory() . '/inc/custom/custom-patterns/four-panel-media-text-dark-first.php' );
    include( get_template_directory() . '/inc/custom/custom-patterns/usp-media-text.php' );

}
add_action( 'init', 'register_custom_block_patterns' );


