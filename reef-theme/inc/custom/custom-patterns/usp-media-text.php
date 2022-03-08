<?php
register_block_pattern(
    'custom/usp-media-text',
    array(
        'title'         => __( 'Custom - M/T - USP - M/T', 'reef-theme' ),
        'description'   => _x( 'Media/text - USP - Media/text', 'A media and textblock followed by a 3 column USP and another media and text block', 'reef-theme' ),
        'categories'    => array( 'custom' ),
        'keywords'      => array( 'custom', 'usp', 'media' ),
        'content'       => '<!-- wp:media-text {"align":""} -->
                            <div class="wp-block-media-text is-stacked-on-mobile"><figure class="wp-block-media-text__media"></figure><div class="wp-block-media-text__content"><!-- wp:paragraph {"placeholder":"Content…","fontSize":"large"} -->
                            <p class="has-large-font-size"></p>
                            <!-- /wp:paragraph --></div></div>
                            <!-- /wp:media-text -->

                            <!-- wp:columns -->
                            <div class="wp-block-columns"><!-- wp:column -->
                            <div class="wp-block-column"><!-- wp:heading -->
                            <h2></h2>
                            <!-- /wp:heading -->

                            <!-- wp:image -->
                            <figure class="wp-block-image"><img alt=""/></figure>
                            <!-- /wp:image -->

                            <!-- wp:paragraph -->
                            <p></p>
                            <!-- /wp:paragraph --></div>
                            <!-- /wp:column -->

                            <!-- wp:column -->
                            <div class="wp-block-column"><!-- wp:heading -->
                            <h2></h2>
                            <!-- /wp:heading -->

                            <!-- wp:image -->
                            <figure class="wp-block-image"><img alt=""/></figure>
                            <!-- /wp:image -->

                            <!-- wp:paragraph -->
                            <p></p>
                            <!-- /wp:paragraph --></div>
                            <!-- /wp:column -->

                            <!-- wp:column -->
                            <div class="wp-block-column"><!-- wp:heading -->
                            <h2></h2>
                            <!-- /wp:heading -->

                            <!-- wp:image -->
                            <figure class="wp-block-image"><img alt=""/></figure>
                            <!-- /wp:image -->

                            <!-- wp:paragraph -->
                            <p></p>
                            <!-- /wp:paragraph --></div>
                            <!-- /wp:column --></div>
                            <!-- /wp:columns -->

                            <!-- wp:media-text {"align":"","mediaPosition":"right"} -->
                            <div class="wp-block-media-text has-media-on-the-right is-stacked-on-mobile"><figure class="wp-block-media-text__media"></figure><div class="wp-block-media-text__content"><!-- wp:paragraph {"placeholder":"Content…","fontSize":"large"} -->
                            <p class="has-large-font-size"></p>
                            <!-- /wp:paragraph --></div></div>
                            <!-- /wp:media-text -->',

    )
);