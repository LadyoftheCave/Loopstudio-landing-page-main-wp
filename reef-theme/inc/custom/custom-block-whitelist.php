<?php
//
// Custom | Block Whitelist 
//
// @package      reef-theme
// @author       Daniël R.
// @since        1.0.0


//
// Gütenberg block whitelist
// Voeg hier de blokken toe die je wil gaan gebruiken.
//
// Er lijkt een bug te zitten in het whitelisten van de core/buttons. Ook al is deze gewhitelist je kan niet meer dan 1 knop toevoegen. [+] verschijnt niet.
// Om dit op te lossen moet 'core/button' ook otoegevoegd worden.
// Eenzelfde soort bug zit in het toevoegen van patterns. Als je een column block hebt toegevoegd moet je zowel 'core/columns' als 'core/column' whitelisten.

if(!function_exists('reef_allowed_blocks')) {
	function reef_allowed_block_types( $allowed_blocks ) {
		return array(
			// Tekst
			'core/heading',
			'core/paragraph',
			'core/quote',
			'core/list',
			// Media
			'core/image',
			'core/media-text',
			'core/gallery',
			// Ontwerp
			'core/button',
			'core/buttons',
			'core/group',
			'core/column',
			'core/columns',
			// Widgets
			'core/shortcode',
			//Embeds
			'core-embed/youtube',
			'core-embed/vimeo',
			//custom blocks
			'wa/myblock',
			// Reusable blocks
			'core/block',
		);
	}
	add_filter( 'allowed_block_types_all', 'our_allowed_block_types' );
}