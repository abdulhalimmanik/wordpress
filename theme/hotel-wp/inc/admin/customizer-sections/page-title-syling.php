<?php
/**
 * Section Page Title
 *
 * @package Hotel-WP
 */

thim_customizer()->add_section(
	array(
		'id'       => 'page_title_styling',
		'panel'    => 'page_title_bar',
		'title'    => esc_html__( 'Title', 'hotel-wp' ),
		'priority' => 12,
	)
);

// Padding Top
thim_customizer()->add_field(
	array(
		'id'          => 'page_title_padding_top',
		'type'        => 'dimension',
		'label'       => esc_html__( 'Padding Top', 'hotel-wp' ),
		'tooltip'     => esc_html__( 'You can choose padding top from page title to menu in header overlay layout. Example: 10px, 3em, 48%, 90vh etc.', 'hotel-wp' ),
		'section'     => 'page_title_styling',
		'default'     => '0',
		'priority'    => 13,
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'choice'   => 'padding-top',
				'element'  => '.page-title .main-top .content',
				'property' => 'padding-top',
			),
		)
	)
);

// Align Page Title
thim_customizer()->add_field(
	array(
		'id'        => 'font_page_title',
		'type'      => 'typography',
		'label'     => esc_html__( 'Fonts Title', 'hotel-wp' ),
		'tooltip'   => esc_html__( 'Allows you to select font properties for page title. ', 'hotel-wp' ),
		'section'   => 'page_title_styling',
		'priority'  => 15,
		'default'   => array(
			'font-size'  => '48px',
			'color'      => '#ffffff',
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'choice'   => 'font-size',
				'element'  => '.page-title .main-top .content h1,
                                .page-title .main-top .content h2',
				'property' => 'font-size',
			),
			array(
				'choice'   => 'color',
				'element'  => '.page-title .main-top .content h1,
                                .page-title .main-top .content h2',
				'property' => 'color',
			),
		)
	)
);

// Enable or Disable line under title
thim_customizer()->add_field(
	array(
		'id'          => 'show_line_under_title',
		'type'        => 'switch',
		'label'       => esc_html__( 'Show line', 'hotel-wp' ),
		'tooltip'     => esc_html__( 'Allows you to show line under title.', 'hotel-wp' ),
		'section'     => 'page_title_styling',
		'default'     => false,
		'priority'    => 30,
		'choices'     => array(
			true  	  => esc_html__( 'Show', 'hotel-wp' ),
			false	  => esc_html__( 'Hide', 'hotel-wp' ),
		),
	)
);


