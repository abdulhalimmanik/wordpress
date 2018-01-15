<?php
/**
 * Section event single
 */

thim_customizer()->add_section(
    array(
        'id'       => 'event-single',
        'panel'    => 'event',
        'title'    => esc_html__( 'Single', 'hotel-wp' ),
        'priority' => 15,
    )
);

// Archive Layouts
thim_customizer()->add_field(
    array(
        'id'            => 'event_single_layout',
        'type'          => 'radio-image',
        'label'         => esc_html__( 'Single Layouts', 'hotel-wp' ),
        'tooltip'       => esc_html__( 'Allows you to choose a layout to display for all event Single page.', 'hotel-wp' ),
        'section'       => 'event-single',
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
        'id'          => 'event_single_layout_sidebar_left',
        'type'        => 'select',
        'label'       => esc_html__( 'Sidebar Left For Single Layout ', 'hotel-wp' ),
        'tooltip'     => esc_html__( 'Allows you to select a sidebar to display in sidebar left when you used Full sidebar layout on product Single layout.', 'hotel-wp' ),
        'section'     => 'event-single',
        'priority'    => 13,
        'multiple'    => 1,
        'choices'     => thim_get_list_sidebar(),
        'active_callback' => array(
            array(
                'setting'  => 'event_single_layout',
                'operator' => '===',
                'value'    => 'full-sidebar',
            ),
        ),
    )
);

// Select Sidebar To Display In Sidebar Right For Full Sidebar Layout
thim_customizer()->add_field(
    array(
        'id'          => 'event_single_layout_sidebar_right',
        'type'        => 'select',
        'label'       => esc_html__( 'Sidebar Right For Single Layout', 'hotel-wp' ),
        'tooltip'     => esc_html__( 'Allows you to select a sidebar to display in sidebar right when you used Full sidebar layout on product Single layout.', 'hotel-wp' ),
        'section'     => 'event-single',
        'priority'    => 14,
        'multiple'    => 1,
        'choices'     => thim_get_list_sidebar(),
        'active_callback' => array(
            array(
                'setting'  => 'event_single_layout',
                'operator' => '===',
                'value'    => 'full-sidebar',
            ),
        ),
    )
);