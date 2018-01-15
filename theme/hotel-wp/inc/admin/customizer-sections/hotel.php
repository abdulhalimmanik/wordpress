<?php
/**
 * Panel TP Hotel Booking
 */

thim_customizer()->add_panel(
	array(
		'id'       => 'hotel',
		'priority' => 42,
		'title'    => esc_html__( 'Hotel Booking', 'hotel-wp' ),
	)
);