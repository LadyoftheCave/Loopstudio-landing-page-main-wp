<?php
//
// Partial | Geen resultaten
//
// @package      reef-theme
// @author       Daniël R.
// @since        1.0.0
//
// TODO: Vertalingen


echo '<section class="no-results not-found">';

	echo '<header class="entry-header"><h1 class="entry-title">' . esc_html__( 'Helaas, we hebben niets kunnen vinden...', 'reef-theme' ) . '</h1></header>';
	echo '<div class="entry-content">';

	if ( is_search() ) {

		echo '<p>' . esc_html__( 'Sorry, maar niets kwam overeen met uw zoektermen. Probeer het opnieuw met een aantal andere zoekwoorden.', 'reef-theme' ) . '</p>';
		get_search_form();

	} else {

		echo '<p>' . esc_html__( 'Het lijkt erop dat we niet kunnen vinden wat u zoekt. Misschien kan zoeken helpen.', 'reef-theme' ) . '</p>';
		get_search_form();
	}

	echo '</div> <!-- /.entry-content -->';
echo '</section>';
