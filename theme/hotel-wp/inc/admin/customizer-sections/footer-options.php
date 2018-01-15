<?php
/**
 * Section Footer Settings
 *
 */

// Add Section Footer Options
thim_customizer()->add_section(
	array(
		'id'       => 'footer_options',
		'title'    => esc_html__( 'Settings', 'hotel-wp' ),
		'panel'    => 'footer',
		'priority' => 10,
	)
);

// Select Header Position
thim_customizer()->add_field(
	array(
		'id'          => 'footer_style',
		'type'        => 'select',
		'label'       => esc_html__( 'Footer Style', 'hotel-wp' ),
		'tooltip'     => esc_html__( 'Allows you to select style for footer. ', 'hotel-wp' ),
		'section'     => 'footer_options',
		'priority'    => 15,
		'multiple'    => 0,
		'default'     => 'style-1',
		'choices'     => array(
			'style-1' => esc_html__( 'Style 1', 'hotel-wp' ),
			'style-2' => esc_html__( 'Style 2', 'hotel-wp' ),
		),
	)
);

// Enable or Disable Footer Widgets
thim_customizer()->add_field(
	array(
		'type'     => 'switch',
		'id'       => 'footer_widgets',
		'label'    => esc_html__( 'Show Footer Widgets', 'hotel-wp' ),
		'tooltip'  => esc_html__( 'Turn on to display footer widgets.', 'hotel-wp' ),
		'section'  => 'footer_options',
		'default'  => true,
		'priority' => 20,
		'choices'  => array(
			true  => esc_html__( 'On', 'hotel-wp' ),
			false => esc_html__( 'Off', 'hotel-wp' ),
		),
	)
);

// Footer Column Numbers
thim_customizer()->add_field(
	array(
		'type'            => 'slider',
		'id'              => 'footer_columns',
		'label'           => esc_html__( 'Sidebar Number', 'hotel-wp' ),
		'tooltip'         => esc_html__( 'Controls the number of columns in the footer.', 'hotel-wp' ),
		'section'         => 'footer_options',
		'default'         => 4,
		'priority' 		  => 30,
		'choices'         => array(
			'min'  => '1',
			'max'  => '6',
			'step' => '1',
		),
		'active_callback' => array(
			array(
				'setting'  => 'footer_widgets',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

// Footer Width Columns
thim_customizer()->add_field(
	array(
		'id'          => 'footer_width_column',
		'type'        => 'text',
		'label'       => esc_html__( 'Width Column', 'hotel-wp' ),
		'tooltip' 	  => esc_html__( 'Enter width of the ( columns 1 + columns 2 + columns 3 + columns 4 ) total of 12.', 'hotel-wp' ),
		'section'     => 'footer_options',
		'default' 	  => '4+2+2+4',
		'priority'    => 35,
	)
);

// Footer Background Color
thim_customizer()->add_field(
	array(
		'type'      => 'color',
		'id'        => 'footer_background_color',
		'label'     => esc_html__( 'Background Color', 'hotel-wp' ),
		'section'   => 'footer_options',
		'default'   => '#f7f4f2',
		'priority'  => 40,
		'alpha'     => true,
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => 'footer#colophon .footer',
				'function' => 'css',
				'property' => 'background-color',
			),
		),
	)
);

// Footer Text Color
thim_customizer()->add_field(
	array(
		'type'      => 'multicolor',
		'id'        => 'footer_color',
		'label'     => esc_html__( 'Colors', 'hotel-wp' ),
		'section'   => 'footer_options',
		'priority'  => 50,
		'choices'   => array(
			'title' => esc_html__( 'Title', 'hotel-wp' ),
			'text'  => esc_html__( 'Text', 'hotel-wp' ),
			'link'  => esc_html__( 'Link', 'hotel-wp' ),
			'hover' => esc_html__( 'Hover', 'hotel-wp' ),
		),
		'default'   => array(
			'title' => '#4a4a4a',
			'text'  => '#8a8a8a',
			'link'  => '#8a8a8a',
			'hover' => '#E7AD44',
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'choice'   => 'title',
				'element'  => 'footer#colophon h1, footer#colophon h2, footer#colophon h3, footer#colophon h4, footer#colophon h5, footer#colophon h6',
				'property' => 'color',
			),
			array(
				'choice'   => 'text',
				'element'  => 'footer#colophon',
				'property' => 'color',
			),
			array(
				'choice'   => 'link',
				'element'  => 'footer#colophon a',
				'property' => 'color',
			),
			array(
				'choice'   => 'hover',
				'element'  => 'footer#colophon a:hover',
				'property' => 'color',
			),
		),
	)
);