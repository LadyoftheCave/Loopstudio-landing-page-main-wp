<?php
//
// Navigation
//
// @package      reef-theme
// @author       Daniël R.
// @since        1.0.0
//

//
// Mobiel Menu
// Dit menu gaat via de tha_header_bottom hook naar de pagina.
// tha_header_bottom staat in header.php
//
// Menus registreren gebeurd in theme-support.php en kan in een child thema met de reef_setup() functie worden uitgevoerd.
//


function reef_site_header() {
	echo reef_mobile_menu_toggle();
	echo reef_search_toggle();
	echo '<div class="header-search">' . get_search_form( array( 'echo' => false ) ) . '<div class="overlay"></div></div>';

	echo '<nav class="nav-menu" role="navigation">';
	if( has_nav_menu( 'primary' ) ) {
		wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'container_class' => 'nav-primary' ) );
	}
	if( has_nav_menu( 'secondary' ) ) {
		wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu', 'container_class' => 'nav-secondary' ) );
	}
	echo '</nav>';



}
add_action( 'tha_header_bottom', 'reef_site_header', 11 );



//
// Zoekfunctie alleen weergeven op primary
//
function reef_nav_extras( $menu, $args ) {

	if( 'primary' === $args->theme_location ) {
		$menu .= '<li class="menu-item search">' . reef_search_toggle() . '</li>';
	}

	if( 'secondary' === $args->theme_location ) {
		$menu .= '<li class="menu-item search">' . get_search_form( false ) . '</li>';
	}

	return $menu;
}
add_filter( 'wp_nav_menu_items', 'reef_nav_extras', 10, 2 );



//
// Zoekfunctie
//
function reef_search_toggle() {
	$output = '<button class="search-toggle">';
		$output .= wa_svg_icon( array( 'icon' => 'search', 'size' => 24, 'class' => 'open' ) );
		$output .= wa_svg_icon( array( 'icon' => 'close', 'size' => 24, 'class' => 'close' ) );
		$output .= '<span class="screen-reader-text">Search</span>';
	$output .= '</button>';
	return $output;
}



//
// Hamburger menu
//
function reef_mobile_menu_toggle() {
	$output = '<button class="menu-toggle">';
		$output .= wa_svg_icon( array( 'icon' => 'menu', 'size' => 24, 'class' => 'open' ) );
		$output .= wa_svg_icon( array( 'icon' => 'close', 'size' => 24, 'class' => 'close' ) );
		$output .= '<span class="screen-reader-text">Menu</span>';
	$output .= '</button>';
	return $output;
}



//
// Dropdown icoontje naast top level menus die submenus hebben.
// https://developer.wordpress.org/reference/hooks/walker_nav_menu_start_el/
//
function reef_nav_add_dropdown_icons( $output, $item, $depth, $args ) {

	if ( ! isset( $args->theme_location ) || 'primary' !== $args->theme_location ) {
		return $output;
	}

	if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {

		// Add SVG icon to parent items.
		$icon = wa_svg_icon( array( 'icon' => 'navigate-down', 'size' => 10, 'title' => 'Submenu Dropdown' ) );

		$output .= '<button class="submenu-expand" tabindex="-1">'.$icon.'</button>';
			
		
	}

	return $output;
}
add_filter( 'walker_nav_menu_start_el', 'reef_nav_add_dropdown_icons', 10, 4 );

?>