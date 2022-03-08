<?php
//
// Partial | Archive
//
// @package      reef-theme
// @author       Daniël R.
// @since        1.0.0
//
// TODO: fix functies (naar native wordpress?)
// TODO: Willen we de first term functie (helper-functions.php) houden?
// TODO: thumbnail_medium altijd?
// TODO: Excerpts?
//
$max_chars_excerpt = 170;

echo '<article class="post-summary">';

	// ea_post_summary_image();

		echo '<a class="post-summary__image" href="' . get_permalink() . '" tabindex="-1" aria-hidden="true">' . wp_get_attachment_image( get_post_thumbnail_id() , 'thumbnail_medium' ).'</a>';
	

	echo '<div class="post-summary__content">';

		// ea_post_summary_title();
		global $wp_query;
		$tag = ( is_singular() || -1 === $wp_query->current_post ) ? 'h3' : 'h2';
		echo '<' . $tag . ' class="post-summary__title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></' . $tag . '>';

		// ea_entry_category();
		// de first_term functie staat in helper-functions.php
		$term = reef_first_term();
		if( !empty( $term ) && ! is_wp_error( $term ) )
			echo '<p class="entry-category"><a href="' . get_term_link( $term, 'category' ) . '">' . $term->name . '</a></p>';

		// The excerpt
		echo '<div class="post-summary__excerpt">' . substr(get_the_excerpt(), 0, $max_chars_excerpt) . '...</div>';

	echo '</div> <!-- .post-summary__content-->';

echo '</article>';
