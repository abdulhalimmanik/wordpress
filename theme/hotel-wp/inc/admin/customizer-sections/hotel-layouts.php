<?php
/**
 * Section Hotel Layouts
 */

thim_customizer()->add_section(
	array(
		'id'             => 'hotel_layout',
		'panel'			 => 'hotel',
		'title'          => esc_html__( 'Layouts', 'hotel-wp' ),
		'priority'       => 10,
	)
);

//-------------------------------------------------Archive---------------------------------------------//

// Select Hotel Archive Layout
thim_customizer()->add_field(
	array(
		'id'            => 'hotel_archive_layout',
		'type'          => 'radio-image',
		'label'         => esc_html__( 'Archive Layouts', 'hotel-wp' ),
		'tooltip'       => esc_html__( 'Allows you to choose a layout to display rooms.', 'hotel-wp' ),
		'section'       => 'hotel_layout',
		'priority'      => 12,
		'choices'       => array(
			'sidebar-left'     => THIM_URI . 'assets/images/layout/sidebar-left.jpg',
			'no-sidebar'       => THIM_URI . 'assets/images/layout/body-full.jpg',
			'sidebar-right'    => THIM_URI . 'assets/images/layout/sidebar-right.jpg',
			'full-sidebar'     => THIM_URI . 'assets/images/layout/body-left-right.jpg'
		),
	)
);

// Select Sidebar To Display In Sidebar Left For Full Sidebar Layout
thim_customizer()->add_field(
	array(
		'id'          => 'hotel_archive_layout_sidebar_left',
		'type'        => 'select',
		'label'       => esc_html__( 'Sidebar Left For Archive Layout ', 'hotel-wp' ),
		'tooltip'     => esc_html__( 'Allows you to select a sidebar to display in sidebar left when you used Full sidebar layout on Rooms layout.', 'hotel-wp' ),
		'section'     => 'hotel_layout',
		'priority'    => 13,
		'multiple'    => 1,
		'default'     => 'sidebar',
		'choices'     => thim_get_list_sidebar(),
		'active_callback' => array(
			array(
				'setting'  => 'hotel_archive_layout',
				'operator' => '===',
				'value'    => 'full-sidebar',
			),
		),
	)
);

// Select Sidebar To Display In Sidebar Right For Full Sidebar Layout
thim_customizer()->add_field(
	array(
		'id'          => 'hotel_archive_layout_sidebar_right',
		'type'        => 'select',
		'label'       => esc_html__( 'Sidebar Right For Archive Layout', 'hotel-wp' ),
		'tooltip'     => esc_html__( 'Allows you to select a sidebar to display in sidebar right when you used Full sidebar layout on Rooms layout.', 'hotel-wp' ),
		'section'     => 'hotel_layout',
		'priority'    => 14,
		'multiple'    => 1,
		'default'     => 'sidebar',
		'choices'     => thim_get_list_sidebar(),
		'active_callback' => array(
			array(
				'setting'  => 'hotel_archive_layout',
				'operator' => '===',
				'value'    => 'full-sidebar',
			),
		),
	)
);

//-------------------------------------------------Single---------------------------------------------//

// Select Single Layout
thim_customizer()->add_field(
	array(
		'id'            => 'hotel_single_layout',
		'type'          => 'radio-image',
		'label'         => esc_html__( 'Single Layouts', 'hotel-wp' ),
		'tooltip'       => esc_html__( 'Allows you to choose a layout to display for only room page on your site.', 'hotel-wp' ),
		'section'       => 'hotel_layout',
		'priority'      => 20,
		'choices'       => array(
			'sidebar-left'     => THIM_URI . 'assets/images/layout/sidebar-left.jpg',
			'no-sidebar'       => THIM_URI . 'assets/images/layout/body-full.jpg',
			'sidebar-right'    => THIM_URI . 'assets/images/layout/sidebar-right.jpg',
			'full-sidebar'     => THIM_URI . 'assets/images/layout/body-left-right.jpg'
		),
	)
);

// Select Sidebar To Display In Sidebar Left For Full Sidebar Layout
thim_customizer()->add_field(
	array(
		'id'          => 'hotel_single_layout_sidebar_left',
		'type'        => 'select',
		'label'       => esc_html__( 'Sidebar Left For Single Layout', 'hotel-wp' ),
		'tooltip'     => esc_html__( 'Allows you to select a sidebar to display in sidebar left when you used Full sidebar layout on Room layout.', 'hotel-wp' ),
		'section'     => 'blog_layout',
		'priority'    => 21,
		'multiple'    => 1,
		'choices'     => thim_get_list_sidebar(),
		'active_callback' => array(
			array(
				'setting'  => 'hotel_single_layout',
				'operator' => '===',
				'value'    => 'full-sidebar',
			),
		),
	)
);

// Select Sidebar To Display In Sidebar Right For Full Sidebar Layout
thim_customizer()->add_field(
	array(
		'id'          => 'hotel_single_layout_sidebar_right',
		'type'        => 'select',
		'label'       => esc_html__( 'Sidebar Right For Single Layout', 'hotel-wp' ),
		'tooltip'     => esc_html__( 'Allows you to select a sidebar to display in sidebar right when you used Full sidebar layout on Room layout.', 'hotel-wp' ),
		'section'     => 'hotel_layout',
		'priority'    => 22,
		'multiple'    => 1,
		'choices'     => thim_get_list_sidebar(),
		'active_callback' => array(
			array(
				'setting'  => 'hotel_single_layout',
				'operator' => '===',
				'value'    => 'full-sidebar',
			),
		),
	)
);