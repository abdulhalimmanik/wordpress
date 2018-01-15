<?php
/**
 * Section Hotel Settings
 *
 * @package Hotel-WP
 */

thim_customizer()->add_section(
	array(
		'id'       => 'hotel_settings',
		'panel'    => 'hotel',
		'title'    => esc_html__( 'Settings', 'hotel-wp' ),
		'priority' => 10,
	)
);


// Sharing Group
thim_customizer()->add_field(
	array(
		'id'       => 'hotel_group_sharing',
		'type'     => 'sortable',
		'label'    => esc_html__( 'Sortable Buttons Sharing', 'hotel-wp' ),
		'tooltip'  => esc_html__( 'Click on eye icons to show or hide buttons. Use drag and drop to change the position of social share icons..', 'hotel-wp' ),
		'section'  => 'hotel_settings',
		'priority' => 10,
		'default'  => array(
			'facebook',
			'twitter',
			'google',
		),
		'choices'  => array(
			'facebook'  => esc_html__( 'Facebook', 'hotel-wp' ),
			'twitter'   => esc_html__( 'Twitter', 'hotel-wp' ),
			'pinterest' => esc_html__( 'Pinterest', 'hotel-wp' ),
			'google'    => esc_html__( 'Google Plus', 'hotel-wp' ),
		),
	)
);