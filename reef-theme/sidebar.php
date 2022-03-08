<?php
//
// Sidebar
//
// @package      reef-theme
// @author       Daniël R.
// @since        1.0.0
//

tha_sidebars_before();

echo '<aside class="sidebar-primary" role="complementary">';
	tha_sidebar_top();
	if ( is_active_sidebar( 'primary-sidebar' ) )
		dynamic_sidebar( 'primary-sidebar' );
	tha_sidebar_bottom();
echo '</aside>';

tha_sidebars_after();
?>