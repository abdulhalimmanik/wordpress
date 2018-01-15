<?php
/**
 * Panel Footer
 * 
 * @package Hotel-WP
 */

thim_customizer()->add_panel(
	array(
		'id'       => 'footer',
		'priority' => 60,
		'title'    => esc_html__( 'Footer', 'hotel-wp' ),
	)
);
