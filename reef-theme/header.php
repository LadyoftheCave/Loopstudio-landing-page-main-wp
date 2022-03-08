<?php
//
// Header
//
// @package      reef-theme
// @author       Daniël R.
// @since        1.0.0
//
// TODO: Verschillende includes voor banner. Hoe gaan we dat doen? handmatig met includes? if/else/case gebasseerd op admin options via acf?
// TODO: Default banner
// TODO: Paginas met content (header/footer/arcive/page etc.) meer consistent maken echos of html? 
// TODO: Moet de h1 check er weer in?

global $logo_text;

echo '<!DOCTYPE html>';
tha_html_before();
echo '<html ' . get_language_attributes() . '>';

echo '<head>';
	tha_head_top(); 
	wp_head();
	tha_head_bottom();
echo '</head>';

echo '<body class="' . join( ' ', get_body_class() ) . '">';
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}

tha_body_top();

	tha_header_before(); ?>

    <header class="site-header" role="banner">
    	<div class="wrap">

	<?php tha_header_top();	?>

    		<div class="title-area">

				<p class="site-title"><a href="<?php echo esc_url( home_url() );?>" rel="home"><?php echo wa_svg_icon(['icon' => 'logo']); ?>
					<?php if($logo_text) echo get_bloginfo( 'name' ); ?>
				</a></p>

    		</div> <!-- /.title-area -->

	<?php tha_header_bottom(); ?>

    	</div> <!-- /.wrap -->
    </header>

	<?php tha_header_after(); ?>


	<?php 
		$bgurl = get_the_post_thumbnail_url();
		if( class_exists('ACF') ) {
			if(empty($bgurl)){ $bgurl = get_field('banner_afbeelding', 'option'); }
		}
		if(empty($bgurl)){ $bgurl = get_the_post_thumbnail_url(get_option( 'page_on_front' )); }
		echo '<div class="banner" style="background-image: url('. $bgurl .')"></div>';
	?>

	<div class="site-container">


