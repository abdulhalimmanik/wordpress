<?php
/**
 * Section Header Layout
 * 
 * @package Hotel-WP
 */

thim_customizer()->add_section(
	array(
		'id'             => 'header_layout',
		'title'          => esc_html__( 'Layouts', 'hotel-wp' ),
		'panel'			 => 'header',
		'priority'       => 10,
	)
);

// Select Header Layout
thim_customizer()->add_field(
	array(
		'id'            => 'header_style',
		'type'          => 'radio-image',
		'label'         => esc_html__( 'Header Layouts', 'hotel-wp' ),
		'tooltip'     	=> esc_html__( 'Allows you to select header layout for header on your site. ', 'hotel-wp' ),
		'section'       => 'header_layout',
		'default'       => 'header_v1',
		'priority'      => 10,
		'choices'       => array(
			'header_v1'     => THIM_URI . 'assets/images/header/header_v1.jpg',
			'header_v2'     => THIM_URI . 'assets/images/header/header_v2.jpg',
			'header_v3'     => THIM_URI . 'assets/images/header/header_v3.jpg',
			'header_v4'     => THIM_URI . 'assets/images/header/header_v1.jpg',
		),
	)
);

// Select Header Position
thim_customizer()->add_field(
	array(
		'id'          => 'header_position',
		'type'        => 'select',
		'label'       => esc_html__( 'Header Positions', 'hotel-wp' ),
		'tooltip'     => esc_html__( 'Allows you to select layout position for header layout. ', 'hotel-wp' ),
		'section'     => 'header_layout',
		'priority'    => 20,
		'multiple'    => 0,
		'default'     => 'overlay',
		'choices'     => array(
			'default' => esc_html__( 'Default', 'hotel-wp' ),
			'overlay' => esc_html__( 'Overlay', 'hotel-wp' ),
		),
	)
);

// Background Header
thim_customizer()->add_field(
	array(
		'id'          => 'header_background_color',
		'type'        => 'color',
		'label'       => esc_html__( 'Background Color', 'hotel-wp' ),
		'tooltip'     => esc_html__( 'Allows you to choose background color for your header. ', 'hotel-wp' ),
		'section'     => 'header_layout',
		'default'     => 'rgba(255,255,255,0)',
		'priority'    => 30,
		'alpha'       => true,
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'choice'   => 'color',
				'element'  => 'body #masthead.site-header',
				'property' => 'background-color',
			)
		)
	)
);