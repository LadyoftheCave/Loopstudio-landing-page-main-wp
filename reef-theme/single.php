<?php
//
// Single
//
// @package      reef-theme
// @author       Daniël R.
// @since        1.0.0
//
// TODO: Breadcrumbs

//
// Before entry
//
function reef_single_before_entry(){
 
    $id = get_the_author_meta( 'ID' );
	echo '<p class="entry-author"><a href="' . get_author_posts_url( $id ) . '" aria-hidden="true" tabindex="-1">' . get_avatar( $id, 40 ) . '</a><em>by</em> <a href="' . get_author_posts_url( $id ) . '">' . get_the_author() . '</a></p>';

    $term = reef_first_term();
	if( !empty( $term ) && ! is_wp_error( $term ) )
		echo '<p class="entry-category"><a href="' . get_term_link( $term, 'category' ) . '">' . $term->name . '</a></p>';
   
}
add_action( 'tha_entry_top', 'reef_single_before_entry', 8 );

///
// After entry
//
function reef_single_after_entry() {
	echo '<div class="after-entry">';

	// Breadcrumbs
	reef_breadcrumbs();

	// Publish date
	echo '<p class="publish-date">Gepubliceerd op: ' . get_the_date( 'l F j, Y' ) . '</p>';


	echo '</div>';

	// If comments are open load up the comment template.
	if ( comments_open() ) :
		comments_template();
	endif;

}
add_action( 'tha_content_while_after', 'reef_single_after_entry', 8 );



// Build the page
require get_template_directory() . '/index.php';