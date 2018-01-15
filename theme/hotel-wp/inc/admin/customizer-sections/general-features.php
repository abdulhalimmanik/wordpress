<?php
/**
 * Section Advance features
 *
 * @package Hotel-WP
 */

thim_customizer()->add_section(
	array(
		'id'       => 'advanced',
		'panel'    => 'general',
		'priority' => 90,
		'title'    => esc_html__( 'Extra Features', 'hotel-wp' ),
	)
);

// Feature: RTL
thim_customizer()->add_field(
	array(
		'type'     => 'switch',
		'id'       => 'feature_rtl_support',
		'label'    => esc_html__( 'RTL Support', 'hotel-wp' ),
		'section'  => 'advanced',
		'default'  => false,
		'priority' => 10,
		'choices'  => array(
			true  => esc_html__( 'On', 'hotel-wp' ),
			false => esc_html__( 'Off', 'hotel-wp' ),
		),
	)
);

// Feature: Smoothscroll
thim_customizer()->add_field(
	array(
		'type'     => 'switch',
		'id'       => 'feature_smoothscroll',
		'label'    => esc_html__( 'Smooth Scrolling', 'hotel-wp' ),
		'tooltip'  => esc_html__( 'Turn on to enable smooth scrolling.', 'hotel-wp' ),
		'section'  => 'advanced',
		'default'  => true,
		'priority' => 20,
		'choices'  => array(
			true  => esc_html__( 'On', 'hotel-wp' ),
			false => esc_html__( 'Off', 'hotel-wp' ),
		),
		'transport' => 'postMessage',
		'js_vars'   => array()
	)
);

// Feature: Open Graph Meta
thim_customizer()->add_field(
	array(
		'type'     => 'switch',
		'id'       => 'feature_open_graph_meta',
		'label'    => esc_html__( 'Open Graph Meta Tags', 'hotel-wp' ),
		'tooltip'  => esc_html__( 'Turn on to enable open graph meta tags which is mainly used when sharing pages on social networking sites like Facebook.', 'hotel-wp' ),
		'section'  => 'advanced',
		'default'  => false,
		'priority' => 30,
		'choices'  => array(
			true  => esc_html__( 'On', 'hotel-wp' ),
			false => esc_html__( 'Off', 'hotel-wp' ),
		),
		'transport' => 'postMessage',
		'js_vars'   => array()
	)
);

// Feature: Back To Top
thim_customizer()->add_field(
	array(
		'type'     => 'switch',
		'id'       => 'feature_backtotop',
		'label'    => esc_html__( 'Back To Top', 'hotel-wp' ),
		'tooltip'  => esc_html__( 'Turn on to enable the Back To Top script which adds the scrolling to top functionality.', 'hotel-wp' ),
		'section'  => 'advanced',
		'default'  => true,
		'priority' => 40,
		'choices'  => array(
			true  => esc_html__( 'On', 'hotel-wp' ),
			false => esc_html__( 'Off', 'hotel-wp' ),
		),
	)
);

// Feature: Toolbar Color For Android
thim_customizer()->add_field(
	array(
		'type'     => 'switch',
		'id'       => 'feature_google_theme',
		'label'    => esc_html__( 'Google Theme', 'hotel-wp' ),
		'tooltip'  => esc_html__( 'Turn on to set the toolbar color in Chrome for Android.', 'hotel-wp' ),
		'section'  => 'advanced',
		'default'  => false,
		'priority' => 50,
		'choices'  => array(
			true  => esc_html__( 'On', 'hotel-wp' ),
			false => esc_html__( 'Off', 'hotel-wp' ),
		),
	)
);

// Feature: Google Theme Color
thim_customizer()->add_field(
	array(
		'type'            => 'color',
		'id'              => 'feature_google_theme_color',
		'label'           => esc_html__( 'Google Theme Color', 'hotel-wp' ),
		'section'         => 'advanced',
		'default'         => '#4A4A4A',
		'priority'        => 60,
		'alpha'           => true,
		'active_callback' => array(
			array(
				'setting'  => 'feature_google_theme',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

// Feature: Preload
thim_customizer()->add_field( array(
	'type'     => 'radio-image',
	'id'       => 'theme_feature_preloading',
	'section'  => 'advanced',
	'label'    => esc_html__( 'Preloading', 'hotel-wp' ),
	'default'  => 'wave',
	'priority' => 70,
	'choices'  => array(
		'off'             => THIM_URI . 'assets/images/preloading/off.jpg',
		'chasing-dots'    => THIM_URI . 'assets/images/preloading/chasing-dots.gif',
		'circle'          => THIM_URI . 'assets/images/preloading/circle.gif',
		'cube-grid'       => THIM_URI . 'assets/images/preloading/cube-grid.gif',
		'double-bounce'   => THIM_URI . 'assets/images/preloading/double-bounce.gif',
		'fading-circle'   => THIM_URI . 'assets/images/preloading/fading-circle.gif',
		'folding-cube'    => THIM_URI . 'assets/images/preloading/folding-cube.gif',
		'rotating-plane'  => THIM_URI . 'assets/images/preloading/rotating-plane.gif',
		'spinner-pulse'   => THIM_URI . 'assets/images/preloading/spinner-pulse.gif',
		'three-bounce'    => THIM_URI . 'assets/images/preloading/three-bounce.gif',
		'wandering-cubes' => THIM_URI . 'assets/images/preloading/wandering-cubes.gif',
		'wave'            => THIM_URI . 'assets/images/preloading/wave.gif',
		'custom-image'    => THIM_URI . 'assets/images/preloading/custom-image.jpg',
	),
) );

// Feature: Preload Image Upload
thim_customizer()->add_field( array(
	'type'            => 'image',
	'id'              => 'theme_feature_preloading_custom_image',
	'label'           => esc_html__( 'Preloading Custom Image', 'hotel-wp' ),
	'section'         => 'advanced',
	'priority'        => 80,
	'active_callback' => array(
		array(
			'setting'  => 'theme_feature_preloading',
			'operator' => '===',
			'value'    => 'custom-image',
		),
	),
) );

// Feature: Preload Colors
thim_customizer()->add_field( array(
	'type'            => 'multicolor',
	'id'              => 'theme_feature_preloading_style',
	'label'           => esc_html__( 'Preloading Style', 'hotel-wp' ),
	'section'         => 'advanced',
	'priority'        => 90,
	'choices'         => array(
		'background' => esc_html__( 'Background color', 'hotel-wp' ),
		'color'      => esc_html__( 'Icon color', 'hotel-wp' ),
	),
	'default'         => array(
		'background' => '#ffffff',
		'color'      => '#E7AD44',
	),
	'active_callback' => array(
		array(
			'setting'  => 'theme_feature_preloading',
			'operator' => '!=',
			'value'    => 'off',
		),
	),
) );

// Feature: Google Analytics
thim_customizer()->add_field(
    array(
        'type'     => 'text',
        'id'       => 'thim_google_analytics',
        'label'    => esc_html__( 'Google Analytics', 'hotel-wp' ),
        'tooltip'  => esc_html__( 'Enter your ID Google Analytics.', 'hotel-wp' ),
        'section'  => 'advanced',
        'priority' => 100,
    )
);