<?php
/**
 * Section event archive
 *
 * @package Hotel-WP
 */

thim_customizer()->add_section(
    array(
        'id'       => 'event-archive',
        'panel'    => 'event',
        'title'    => esc_html__( 'Archive', 'hotel-wp' ),
        'priority' => 10,
    )
);

// Archive Layouts
thim_customizer()->add_field(
    array(
        'id'            => 'event_archive_layout',
        'type'          => 'radio-image',
        'label'         => esc_html__( 'Archive Layouts', 'hotel-wp' ),
        'tooltip'       => esc_html__( 'Allows you to choose a layout to display for all event archive page.', 'hotel-wp' ),
        'section'       => 'event-archive',
        'priority'      => 10,
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
        'id'          => 'event_archive_layout_sidebar_left',
        'type'        => 'select',
        'label'       => esc_html__( 'Sidebar Left For Archive Layout ', 'hotel-wp' ),
        'tooltip'     => esc_html__( 'Allows you to select a sidebar to display in sidebar left when you used Full sidebar layout on product archive layout.', 'hotel-wp' ),
        'section'     => 'event-archive',
        'priority'    => 13,
        'multiple'    => 1,
        'choices'     => thim_get_list_sidebar(),
        'active_callback' => array(
            array(
                'setting'  => 'event_archive_layout',
                'operator' => '===',
                'value'    => 'full-sidebar',
            ),
        ),
    )
);

// Select Sidebar To Display In Sidebar Right For Full Sidebar Layout
thim_customizer()->add_field(
    array(
        'id'          => 'event_archive_layout_sidebar_right',
        'type'        => 'select',
        'label'       => esc_html__( 'Sidebar Right For Archive Layout', 'hotel-wp' ),
        'tooltip'     => esc_html__( 'Allows you to select a sidebar to display in sidebar right when you used Full sidebar layout on product archive layout.', 'hotel-wp' ),
        'section'     => 'event-archive',
        'priority'    => 14,
        'multiple'    => 1,
        'choices'     => thim_get_list_sidebar(),
        'active_callback' => array(
            array(
                'setting'  => 'event_archive_layout',
                'operator' => '===',
                'value'    => 'full-sidebar',
            ),
        ),
    )
);

//Grid Layout Columns
thim_customizer()->add_field(
    array(
        'type'        => 'select',
        'id'          => 'event_column',
        'label'       => esc_html__( 'Grid Columns', 'hotel-wp' ),
        'tooltip'     => esc_html__( 'Allows you to select a number make columns to display events per archive page.', 'hotel-wp' ),
        'section'     => 'event-archive',
        'default'     => '2',
        'priority'    => 10,
        'multiple'    => 0,
        'choices'     => array(
            '2' => esc_html__( '2', 'hotel-wp' ),
            '3' => esc_html__( '3', 'hotel-wp' ),
            '4' => esc_html__( '4', 'hotel-wp' ),
        ),
    )
);

// Numbers per page
thim_customizer()->add_field(
    array(
        'type'        => 'slider',
        'id'          => 'event_per_page',
        'label'       => esc_html__( 'Number Of Events Per Page', 'hotel-wp' ),
        'tooltip'     => esc_html__( 'Allows you to select a number to display event per archive page.', 'hotel-wp' ),
        'section'     => 'event-archive',
        'priority'    => 15,
        'default'     => 4,
        'choices'     => array(
            'min'  => '0',
            'max'  => '20',
            'step' => '1',
        ),
    )
);