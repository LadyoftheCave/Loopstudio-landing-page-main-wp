<?php
//
// Custom | Forms
//
// @package      reef-theme
// @author       Daniël R.
// @since        1.0.0
//

function register_forms() {
	af_register_form( array(
		'key' => 'form_61ee78ce90d81',
		'title' => 'Contactformulier',
		'display' => array(
			'description' => 'Contactformulier met naam. e-mailadres, telefoonnummer en bericht',
			'success_message' => '<p>Bedankt {field:naam}! Je bericht is succesvol verstuurd.</p>
	',
		),
		'create_entries' => true,
		'restrictions' => array(
			'entries' => false,
			'user' => false,
			'schedule' => false,
		),
		'emails' => array(
			array(
				'name' => 'E-mailadres website eigenaar',
				'active' => true,
				'recipient_type' => 'custom',
				'recipient_field' => false,
				'recipient_custom' => '',
				'from' => '{field:e-mailadres}',
				'subject' => 'Inzending formulier {field:naam}',
				'content' => '<p>{all_fields}</p>
	',
			),
		),
	) );
}
// add_action( 'af/register_forms', 'register_forms' );