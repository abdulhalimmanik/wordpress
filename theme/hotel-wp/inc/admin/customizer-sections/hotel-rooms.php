<?php
/**
 * Section Hotel Settings
 *
 * @package Hotel-WP
 */

thim_customizer()->add_section(
	array(
		'id'       => 'hotel_rooms',
		'panel'    => 'hotel',
		'title'    => esc_html__( 'Rooms', 'hotel-wp' ),
		'priority' => 10,
	)
);


// Select Rooms Style
thim_customizer()->add_field(
	array(
		'id'          => 'room_style',
		'type'        => 'select',
		'label'       => esc_html__( 'Rooms Style', 'hotel-wp' ),
		'tooltip'     => esc_html__( 'Allows you to select style for rooms page. ', 'hotel-wp' ),
		'section'     => 'hotel_rooms',
		'priority'    => 20,
		'multiple'    => 0,
		'default'     => 'style-1',
		'choices'     => array(
			'style-1' => esc_html__( 'Style 1', 'hotel-wp' ),
			'style-2' => esc_html__( 'Style 2', 'hotel-wp' ),
		),
	)
);

// Enable or Disable
thim_customizer()->add_field(
	array(
		'id'          => 'enable_book',
		'type'        => 'switch',
		'label'       => esc_html__( 'Show/Hide Book Now', 'hotel-wp' ),
		'tooltip'     => esc_html__( 'Turn on to enable Book Now on your site.', 'hotel-wp' ),
		'section'     => 'hotel_rooms',
		'default'     => true,
		'priority'    => 30,
		'choices'     => array(
			true  	  => esc_html__( 'On', 'hotel-wp' ),
			false	  => esc_html__( 'Off', 'hotel-wp' ),
		),
	)
);
// Custom Title
thim_customizer()->add_field(
	array(
		'id'       => 'room_archive_title',
		'type'     => 'text',
		'label'    => esc_html__( 'Change title archive room', 'hotel-wp' ),
		'tooltip'  => esc_html__( 'Change title archive room', 'hotel-wp' ),
		'section'  => 'hotel_rooms',
		'priority' => 40
	)
);

// Upload Background Image
thim_customizer()->add_field(
	array(
		'id'       => 'room_background_image',
		'type'     => 'image',
		'label'    => esc_html__( 'Upload Background Image', 'hotel-wp' ),
		'tooltip'  => esc_html__( 'Upload an image for the background image of the page room.', 'hotel-wp' ),
		'section'  => 'hotel_rooms',
		'priority' => 50,
		'js_vars'  => array(
			array(
				'element'  => '.main-top',
				'function' => 'css',
				'property' => 'background-image',
			),
		),
		'default'  => THIM_URI . 'assets/images/page-title.jpg',
	)
);