<?php
/**
 * Section Responsive
 * 
 * @package Hotel-WP
 */

thim_customizer()->add_section(
    array(
        'id'             => 'responsive',
        'title'          => esc_html__( 'Responsive', 'hotel-wp' ),
        'priority'       => 70,
    )
);

// Enable or Disable
thim_customizer()->add_field(
    array(
        'id'          => 'enable_responsive',
        'type'        => 'switch',
        'label'       => esc_html__( 'Responsive', 'hotel-wp' ),
        'tooltip'     => esc_html__( 'Turn on to enable responsive on your site.', 'hotel-wp' ),
        'section'     => 'responsive',
        'default'     => true,
        'priority'    => 10,
        'choices'     => array(
            true  	  => esc_html__( 'On', 'hotel-wp' ),
            false	  => esc_html__( 'Off', 'hotel-wp' ),
        ),
    )
);

// Header Mobile Logo
thim_customizer()->add_field(
    array(
        'id'       		=> 'mobile_logo',
        'type'          => 'image',
        'section'  		=> 'responsive',
        'label'    		=> esc_html__( 'Mobile Logo', 'hotel-wp' ),
        'tooltip'     	=> esc_html__( 'Allows you to add, remove, change mobile logo on your site.', 'hotel-wp' ),
        'priority' 		=> 12,
        'default'       => THIM_URI . "assets/images/logo.png",
    )
);

// Mobile Menu Styling
thim_customizer()->add_group( array(
    'id'       => 'responsive_group',
    'section'  => 'responsive',
    'priority' => 30,
    'groups'   => array(
        array(
            'id'     => 'mobile_menu_group',
            'label'  => esc_html__( 'Mobile Menu', 'hotel-wp' ),
            'fields' => array(
                array(
                    'id'          => 'mobile_menu_position',
                    'type'        => 'select',
                    'label'       => esc_html__( 'Position', 'hotel-wp' ),
                    'tooltip'     => esc_html__( 'Allows you to select a mobile menu effect position for header on mobile.', 'hotel-wp' ),
                    'section'     => 'responsive_group',
                    'priority'    => 12,
                    'multiple'    => 0,
                    'default'     => 'creative-left',
                    'choices'     => array(
                        'creative-left' => esc_html__( 'Left', 'hotel-wp' ),
                        'creative-right' => esc_html__( 'Right', 'hotel-wp' ),
                    ),
                    'active_callback' => array(
                        array(
                            'setting'  => 'enable_responsive',
                            'operator' => '==',
                            'value'    => true,
                        ),
                    ),
                ),
                array(
                    'id'          => 'mobile_menu_background_color',
                    'type'        => 'color',
                    'label'       => esc_html__( 'Background Color', 'hotel-wp' ),
                    'tooltip'     => esc_html__( 'Allows you to select a color make background color for header on mobile. ', 'hotel-wp' ),
                    'section'     => 'responsive_group',
                    'default'     => '#222222',
                    'priority'    => 16,
                    'alpha'       => true,
                    'transport' => 'postMessage',
                    'js_vars'   => array(
                        array(
                            'choice'   => 'color',
                            'element'  => 'body.responsive .mobile-menu-container',
                            'property' => 'background-color',
                        )
                    ),
                    'active_callback' => array(
                        array(
                            'setting'  => 'enable_responsive',
                            'operator' => '==',
                            'value'    => true,
                        ),
                    ),
                ),
                array(
                    'id'          => 'text_color_header_mobile',
                    'type'        => 'color',
                    'label'       => esc_html__( 'Text Color', 'hotel-wp' ),
                    'tooltip'     => esc_html__( 'Allows you to select a color make color of header text on mobile.', 'hotel-wp' ),
                    'section'     => 'responsive_group',
                    'default'     => '#ffffff',
                    'priority'    => 17,
                    'alpha'       => true,
                    'transport' => 'postMessage',
                    'js_vars'   => array(
                        array(
                            'choice'   => 'color',
                            'element'  => 'body.responsive .mobile-menu-container ul li>a, 
                               body.responsive .mobile-menu-container ul li>span',
                            'property' => 'color',
                        )
                    ),
                    'active_callback' => array(
                        array(
                            'setting'  => 'enable_responsive',
                            'operator' => '==',
                            'value'    => true,
                        ),
                    ),
                ),
                array(
                    'id'          => 'text_color_hover_header_mobile',
                    'type'        => 'color',
                    'label'       => esc_html__( 'Text Hover Color', 'hotel-wp' ),
                    'tooltip'     => esc_html__( 'Allows you to select color for text link when hover text link on mobile.', 'hotel-wp' ),
                    'section'     => 'responsive_group',
                    'default'     => '#E7AD44',
                    'priority'    => 18,
                    'alpha'       => true,
                    'transport' => 'postMessage',
                    'js_vars'   => array(
                        array(
                            'choice'   => 'color',
                            'element'  => 'body.responsive .mobile-menu-container ul li>a:hover, 
                               body.responsive .mobile-menu-container ul li>span:hover,
                            body.responsive .mobile-menu-container ul li.current-menu-item > a,
                            body.responsive .mobile-menu-container ul li.current-menu-item > span,
                            body.responsive .mobile-menu-container ul li.current-page-parent > a, 
                            body.responsive .mobile-menu-container ul li.current-page-ancestor > a, 
                            body.responsive .mobile-menu-container ul li.current-page-parent > span, 
                            body.responsive .mobile-menu-container ul li.current-page-ancestor > span',
                            'property' => 'color',
                        )
                    ),
                    'active_callback' => array(
                        array(
                            'setting'  => 'enable_responsive',
                            'operator' => '==',
                            'value'    => true,
                        ),
                    ),
                ),
                array(
                    'id'          => 'mobile_menu_icon_color',
                    'type'        => 'color',
                    'label'       => esc_html__( 'Icon Color', 'hotel-wp' ),
                    'tooltip'     => esc_html__( 'Allows you to select a color make color of mobile menu icon.', 'hotel-wp' ),
                    'section'     => 'responsive_group',
                    'default'     => '#E7AD44',
                    'priority'    => 18,
                    'alpha'       => true,
                    'transport' => 'postMessage',
                    'js_vars'   => array(
                        array(
                            'choice'   => 'background-color',
                            'element'  => 'header#masthead .navbar-toggle span.icon-bar',
                            'property' => 'background-color',
                        )
                    ),
                    'active_callback' => array(
                        array(
                            'setting'  => 'enable_responsive',
                            'operator' => '==',
                            'value'    => true,
                        ),
                    ),
                ),
            ),
        )
    ),
) );
