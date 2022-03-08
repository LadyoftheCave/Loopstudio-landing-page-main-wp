<?php
//
// Cleanup | Classes
//
// @package      reef-theme
// @author       Daniël R.
// @since        1.0.0
//
// TODO: body classes opt out ipv opt in
// 		'full-width-content','content-sidebar','content' nodig?



//
// Clean body classes
//
function reef_clean_body_classes( $classes ) {

	$allowed_classes = [
		'singular',
		'single',
		'page',
		'archive',
		'admin-bar',
		'full-width-content',
		'content-sidebar',
		'content',
		'home',
		'error404',
		'wp-embed-repsonsive'
	];

	return array_intersect( $classes, $allowed_classes );

}
add_filter( 'body_class', 'reef_clean_body_classes', 20 );



//
// Clean menu classes
//
function reef_clean_nav_menu_classes( $classes ) {
	if( ! is_array( $classes ) )
		return $classes;

	foreach( $classes as $i => $class ) {

		// Remove class with menu item id
		$id = strtok( $class, 'menu-item-' );
		if( 0 < intval( $id ) )
			unset( $classes[ $i ] );

		// Remove menu-item-type-*
		if( false !== strpos( $class, 'menu-item-type-' ) )
			unset( $classes[ $i ] );

		// Remove menu-item-object-*
		if( false !== strpos( $class, 'menu-item-object-' ) )
			unset( $classes[ $i ] );

		// Change page ancestor to menu ancestor
		if( 'current-page-ancestor' == $class ) {
			$classes[] = 'current-menu-ancestor';
			unset( $classes[ $i ] );
		}
	}

	// Remove submenu class if depth is limited
	if( isset( $args->depth ) && 1 === $args->depth ) {
		$classes = array_diff( $classes, array( 'menu-item-has-children' ) );
	}

	return $classes;
}
add_filter( 'nav_menu_css_class', 'reef_clean_nav_menu_classes', 5 );


//
// Clean Post classes
//
function reef_clean_post_classes( $classes ) {

	if( ! is_array( $classes ) )
		return $classes;

	$allowed_classes = array(
  		'hentry',
  		'type-' . get_post_type(),
   	);

	return array_intersect( $classes, $allowed_classes );
}
add_filter( 'post_class', 'reef_clean_post_classes', 5 );



//
// Clean archive prefix
//
function reef_archive_title_remove_prefix( $title ) {
	$title_pieces = explode( ': ', $title );
	if( count( $title_pieces ) > 1 ) {
		unset( $title_pieces[0] );
		$title = join( ': ', $title_pieces );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'reef_archive_title_remove_prefix' );



//
// Staff comment classes
//
function reef_staff_comment_class( $classes, $class, $comment_id, $comment, $post_id ) {
	if( empty( $comment->user_id ) )
		return $classes;
	$staff_roles = array( 'comment_manager', 'author', 'editor', 'administrator' );
	$staff_roles = apply_filters( 'reef_staff_roles', $staff_roles );
	$user = get_userdata( $comment->user_id );
	if( !empty( array_intersect( $user->roles, $staff_roles ) ) )
		$classes[] = 'staff';
	return $classes;
}
add_filter( 'comment_class', 'reef_staff_comment_class', 10, 5 );



//
// Remove avatars
//
function reef_remove_avatars_from_comments( $avatar ) {
	global $in_comment_loop;
	return $in_comment_loop ? '' : $avatar;
}
add_filter( 'get_avatar', 'reef_remove_avatars_from_comments' );



//
// Clean form and button classes
//
function reef_comment_form_button_class( $args ) {
	$args['class_submit'] = 'submit wp-block-button__link';
	return $args;
}
add_filter( 'comment_form_defaults', 'reef_comment_form_button_class' );



//
// Excerpt more 
//
function reef_excerpt_more() {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'reef_excerpt_more' );