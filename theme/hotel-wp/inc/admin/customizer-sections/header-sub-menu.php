<?php
/**
 * Section Header Sub Menu
 * 
 * @package Hotel-WP
 */

thim_customizer()->add_section(
    array(
        'id'             => 'header_sub_menu',
        'title'          => esc_html__( 'Sub Menu', 'hotel-wp' ),
        'panel'			 => 'header',
        'priority'       => 40,
    )
);

// Background Header
thim_customizer()->add_field(
    array(
        'id'          => 'sub_menu_background_color',
        'type'        => 'color',
        'label'       => esc_html__( 'Background Color', 'hotel-wp' ),
        'tooltip'     => esc_html__( 'Choose a background color for sub menu on the header.', 'hotel-wp' ),
        'section'     => 'header_sub_menu',
        'default'     => '#ffffff',
        'priority'    => 16,
        'alpha'       => true,
        'transport' => 'postMessage',
        'js_vars'   => array(
            array(
                'choice'   => 'color',
                'element'  => 'header#masthead.site-header #primary-menu .sub-menu',
                'property' => 'background-color',
            )
        )
    )
);

// Text Color
thim_customizer()->add_field(
    array(
        'id'          => 'sub_menu_text_color',
        'type'        => 'color',
        'label'       => esc_html__( 'Text Color', 'hotel-wp' ),
        'tooltip'     => esc_html__( 'Choose a text color for sub menu on the header.', 'hotel-wp' ),
        'section'     => 'header_sub_menu',
        'default'     => '#4A4A4A',
        'priority'    => 17,
        'alpha'       => true,
        'transport' => 'postMessage',
        'js_vars'   => array(
            array(
                'choice'   => 'color',
                'element'  => 'header#masthead.site-header .navigation #primary-menu .sub-menu a,
                               header#masthead.site-header .navigation #primary-menu .sub-menu span',
                'property' => 'color',
            )
        )
    )
);

// Text Hover Color
thim_customizer()->add_field(
    array(
        'id'          => 'sub_menu_text_color_hover',
        'type'        => 'color',
        'label'       => esc_html__( 'Text Hover Color', 'hotel-wp' ),
        'tooltip'     => esc_html__( 'Choose a link color when users hover over text link on sub menu on the header.', 'hotel-wp' ),
        'section'     => 'header_sub_menu',
        'default'     => '#E7AD44',
        'priority'    => 18,
        'alpha'       => true,
        'transport' => 'postMessage',
        'js_vars'   => array(
            array(
                'choice'   => 'color',
                'element'  => 'header#masthead.site-header .navigation #primary-menu .sub-menu a:hover,
                               header#masthead.site-header .navigation #primary-menu .sub-menu span:hover',
                'property' => 'color',
            )
        )
    )
);


