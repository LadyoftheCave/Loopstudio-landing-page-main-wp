<?php
//
// Helper Functions
//
// @package      reef-theme
// @author       Daniël R.
// @since        1.0.0
//
// TODO: Simplificeren waar nodig
// TODO: Willen we first term houden? Ref: archive.php en single.php

function reef_first_term( $args = [] ) {

    $defaults = [
        'taxonomy'	=> 'category',
        'field'		=> null,
        'post_id'	=> null,
    ];

    $args = wp_parse_args( $args, $defaults );

    $post_id = !empty( $args['post_id'] ) ? intval( $args['post_id'] ) : get_the_ID();
    $field = !empty( $args['field'] ) ? esc_attr( $args['field'] ) : false;
    $term = false;

    // Use WP SEO Primary Term
    // from https://github.com/Yoast/wordpress-seo/issues/4038
    if( class_exists( 'WPSEO_Primary_Term' ) ) {
        $term = get_term( ( new WPSEO_Primary_Term( $args['taxonomy'],  $post_id ) )->get_primary_term(), $args['taxonomy'] );
    }

    // Fallback on term with highest post count
    if( ! $term || is_wp_error( $term ) ) {

        $terms = get_the_terms( $post_id, $args['taxonomy'] );

        if( empty( $terms ) || is_wp_error( $terms ) )
            return false;

        // If there's only one term, use that
        if( 1 == count( $terms ) ) {
            $term = array_shift( $terms );

        // If there's more than one...
        } else {

            // Sort by term order if available
            // @uses WP Term Order plugin
            if( isset( $terms[0]->order ) ) {
                $list = array();
                foreach( $terms as $term )
                    $list[$term->order] = $term;
                ksort( $list, SORT_NUMERIC );

            // Or sort by post count
            } else {
                $list = array();
                foreach( $terms as $term )
                    $list[$term->count] = $term;
                ksort( $list, SORT_NUMERIC );
                $list = array_reverse( $list );
            }

            $term = array_shift( $list );
        }
    }

    // Output
    if( !empty( $field ) && isset( $term->$field ) )
        return $term->$field;

    else
        return $term;
    }


    function reef_breadcrumbs() {
        if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb( '<p id="breadcrumbs" class="breadcrumb">','</p>' );
        }
    }
?>