<?php
/**
 * Section Sidebars
 * 
 * @package Hotel-WP
 */

thim_customizer()->add_section(
    array(
        'id'       => 'sidebar',
        'title'    => esc_html__( 'Sidebars', 'hotel-wp' ),
        'priority' => 50,
    )
);

// Sidebar Fonts
thim_customizer()->add_field(
    array(
        'id'        => 'sidebar_widget_title',
        'type'      => 'typography',
        'label'     => esc_html__( 'Sidebar Title Fonts', 'hotel-wp' ),
        'tooltip'   => esc_html__( 'Allows you to select font properties for sidebars title. ', 'hotel-wp' ),
        'section'   => 'sidebar',
        'priority'    => 10,
        'default'   => array(
            'font-size'      => '18px',
            'color'          => '#E7AD44',
        ),
        'transport' => 'postMessage',
        'js_vars'   => array(
            array(
                'choice'   => 'font-size',
                'element'  => '#main-content .widget-area .widget .widget-title',
                'property' => 'font-size',
            ),
            array(
                'choice'   => 'color',
                'element'  => '#main-content .widget-area .widget .widget-title',
                'property' => 'color',
            ),
        )
    )
);

// Widget Background Color
thim_customizer()->add_field(
    array(
        'id'          => 'sidebar_widget_background_color',
        'type'        => 'color',
        'label'       => esc_html__( 'Widget Background Color', 'hotel-wp' ),
        'tooltip'     => esc_html__( 'Allows you to choose a background color for widget on sidebar. ', 'hotel-wp' ),
        'section'     => 'sidebar',
        'default'     => '#ffffff',
        'priority'    => 20,
        'alpha'       => true,
        'transport' => 'postMessage',
        'js_vars'   => array(
            array(
                'choice'   => 'color',
                'element'  => '#main-content .widget-area aside.widget',
                'property' => 'background-color',
            )
        )
    )
);

// Choose Margin Bottom
thim_customizer()->add_field(
    array(
        'id'          => 'sidebar_widget_margin_bottom',
        'type'        => 'dimension',
        'label'       => esc_html__( 'Widget Margin Bottom', 'hotel-wp' ),
        'tooltip'     => esc_html__( 'Choose the number of words you want to space between widgets on sidebars. Example: 10px, 3em, 48%, 90vh etc.', 'hotel-wp' ),
        'section'     => 'sidebar',
        'default'     => '30px',
        'priority'    => 30,
        'transport' => 'postMessage',
        'js_vars'   => array(
            array(
                'choice'   => 'font-size',
                'element'  => '#main-content .widget-area aside.widget',
                'property' => 'margin-bottom',
            )
        )
    )
);
