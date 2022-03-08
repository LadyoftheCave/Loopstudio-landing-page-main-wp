<?php
//
// Searchform
//
// @package      reef-theme
// @author       Daniël R.
// @since        1.0.0
// 
// TODO: vertaling?
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text">Search for</span>
		<input type="search" class="search-field" placeholder="Zoeken&hellip;" value="<?php echo get_search_query(); ?>" name="s" title="Zoeken naar" />
	</label>
	<button type="submit" class="search-submit"><?php echo wa_svg_icon( [ 'icon' => 'search' ] );?></button>
</form>