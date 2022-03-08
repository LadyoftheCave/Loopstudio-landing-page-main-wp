<?php
//
// Basis template | Index
//
// @package      reef-theme
// @author       Daniël R.
// @since        1.0.0
//
// TODO: Sidebar?
//

get_header();

tha_content_before();

	echo '<div class="wrap">';

	tha_content_wrap_before();

	echo '<main class="site-main" role="main">';

	tha_content_top();
	tha_content_loop();
	tha_content_bottom();

	echo '</main> <!-- /.site-main -->';

	// get_sidebar();
	tha_content_wrap_after();
	
	echo '</div> <!-- /.wrap -->';

tha_content_after();

get_footer();