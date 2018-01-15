<?php
/**
 * Panel General
 * 
 * @package Hotel-WP
 */

thim_customizer()->add_panel(
	array(
		'id'       => 'general',
		'priority' => 10,
		'title'    => esc_html__( 'General', 'hotel-wp' ),
	)
);