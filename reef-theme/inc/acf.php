<?php
//
// ACF
//
// @package      reef-theme
// @author       Daniël R.
// @since        1.0.0
//
// https://www.advancedcustomfields.com/resources/local-json/
//

//
// Options
//
add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_sub_page') ) {

        // Add parent.
        $parent = acf_add_options_page(array(
            'page_title'  => __('Algemene Settings'),
            'menu_title'  => __('Algemene Settings'),
            'redirect'    => true,
        ));

        // Add header settings sub page.
        $child = acf_add_options_sub_page(array(
            'page_title'  => __('Header Settings'),
            'menu_title'  => __('Header'),
            'parent_slug' => $parent['menu_slug'],
        ));

        // Add footer settings sub page.
        $child = acf_add_options_sub_page(array(
            'page_title'  => __('Footer Settings'),
            'menu_title'  => __('Footer'),
            'parent_slug' => $parent['menu_slug'],
        ));
    }
}


//
// Save
//
add_filter('acf/settings/save_json', 'reef_acf_json_save_point');
 
function reef_acf_json_save_point( $path ) {
    
    // update path
    $path = get_stylesheet_directory() . '/assets/acf-json';
    
    
    // return
    return $path;
    
}



//
// Load
//
add_filter('acf/settings/load_json', 'reef_acf_json_load_point');

function reef_acf_json_load_point( $paths ) {
    
    // remove original path (optional)
    unset($paths[0]);
    
    
    // append path
    $paths[] = get_stylesheet_directory() . '/assets/acf-json';
    
    
    // return
    return $paths;
    
}

?>
 
