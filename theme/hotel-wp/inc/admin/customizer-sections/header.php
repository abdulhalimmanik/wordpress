<?php
/**
 * Panel Header
 * 
 * @package Hotel-WP
 */


thim_customizer()->add_panel(
	array(
		'id'       => 'header',
		'priority' => 20,
		'title'    => esc_html__( 'Header', 'hotel-wp' ),
	)
);