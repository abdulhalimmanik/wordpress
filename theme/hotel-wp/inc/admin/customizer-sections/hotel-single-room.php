<?php
/**
 * Section Hotel Settings
 *
 * @package Hotel-WP
 */

thim_customizer()->add_section(
	array(
		'id'       => 'hotel_single_room',
		'panel'    => 'hotel',
		'title'    => esc_html__( 'Single Rooms', 'hotel-wp' ),
		'priority' => 10,
	)
);

// Enable or Disable
thim_customizer()->add_field(
	array(
		'id'          => 'enable_custom_title',
		'type'        => 'switch',
		'label'       => esc_html__( 'On/Off Custom Title', 'hotel-wp' ),
		'tooltip'     => esc_html__( 'Turn on to enable custom title on your site.', 'hotel-wp' ),
		'section'     => 'hotel_single_room',
		'default'     => true,
		'priority'    => 20,
		'choices'     => array(
			true  	  => esc_html__( 'On', 'hotel-wp' ),
			false	  => esc_html__( 'Off', 'hotel-wp' ),
		),
	)
);
// Custom Title
thim_customizer()->add_field(
	array(
		'id'       => 'room_single_title',
		'type'     => 'text',
		'label'    => esc_html__( 'Change title single room', 'hotel-wp' ),
		'tooltip'  => esc_html__( 'Change title single room', 'hotel-wp' ),
		'section'  => 'hotel_single_room',
		'priority' => 30
	)
);
