<?php
/**
 * Section Header Sticky Menu
 * 
 * @package Hotel-WP
 */

thim_customizer()->add_section(
	array(
		'id'             => 'header_sticky_menu',
		'title'          => esc_html__( 'Sticky Menu', 'hotel-wp' ),
		'panel'			 => 'header',
		'priority'       => 50,
	)
);

// Enable or Disable
thim_customizer()->add_field(
	array(
		'id'          => 'show_sticky_menu',
		'type'        => 'switch',
		'label'       => esc_html__( 'Sticky On Scroll', 'hotel-wp' ),
		'tooltip'     => esc_html__( 'Allows you to show or hide header sticky menu on your site . ', 'hotel-wp' ),
		'section'     => 'header_sticky_menu',
		'default'     => false,
		'priority'    => 10,
		'choices'     => array(
			true  	  => esc_html__( 'On', 'hotel-wp' ),
			false	  => esc_html__( 'Off', 'hotel-wp' ),
		),
	)
);

// Select Style
thim_customizer()->add_field(
	array(
		'id'          => 'sticky_menu_style',
		'type'        => 'select',
		'label'       => esc_html__( 'Select style', 'hotel-wp' ),
		'tooltip'     => esc_html__( 'Allows you to select sticky menu style for your header . ', 'hotel-wp' ),
		'section'     => 'header_sticky_menu',
		'default'     => 'custom',
		'priority'    => 10,
		'multiple'    => 0,
		'choices'     => array(
			'same' 	  => esc_html__( 'The same with main menu', 'hotel-wp' ),
			'custom'  => esc_html__( 'Custom', 'hotel-wp' )
		),
	)
);

// Background Header
thim_customizer()->add_field(
	array(
		'id'          => 'sticky_menu_background_color',
		'type'        => 'color',
		'label'       => esc_html__( 'Background Color', 'hotel-wp' ),
		'tooltip'     => esc_html__( 'Choose a background color for sticky menu on the header.', 'hotel-wp' ),
		'section'     => 'header_sticky_menu',
		'default'     => '#ffffff',
		'priority'    => 16,
		'alpha'       => true,
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'choice'   => 'color',
				'element'  => 'body header#masthead.site-header.custom-sticky.affix',
				'property' => 'background-color',
			)
		),
		'active_callback' => array(
			array(
				'setting'  => 'sticky_menu_style',
				'operator' => '===',
				'value'    => 'custom',
			),
		),
	)
);

// Text Color
thim_customizer()->add_field(
	array(
		'id'          => 'sticky_menu_text_color',
		'type'        => 'color',
		'label'       => esc_html__( 'Text Color', 'hotel-wp' ),
		'tooltip'     => esc_html__( 'Choose a text color for sticky menu on the header.', 'hotel-wp' ),
		'section'     => 'header_sticky_menu',
		'default'     => '#4A4A4A',
		'priority'    => 18,
		'alpha'       => true,
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'choice'   => 'color',
				'element'  => 'body header#masthead.site-header.affix.custom-sticky #primary-menu >li >a,
                               header#masthead.site-header.affix.custom-sticky #primary-menu >li >span,
                               body header.affix .widget_shopping_cart .minicart_hover .cart-items-number,
                               body header#masthead.affix .menu-right a',
				'property' => 'color',
			)
		),
		'active_callback' => array(
			array(
				'setting'  => 'sticky_menu_style',
				'operator' => '===',
				'value'    => 'custom',
			),
		),
	)
);

// Text Hover Color
thim_customizer()->add_field(
	array(
		'id'          => 'sticky_menu_text_color_hover',
		'type'        => 'color',
		'label'       => esc_html__( 'Text Hover Color', 'hotel-wp' ),
		'tooltip'     => esc_html__( 'Choose a link color when users hover over text link on sticky menu on the header.', 'hotel-wp' ),
		'section'     => 'header_sticky_menu',
		'default'     => '#E7AD44',
		'priority'    => 19,
		'alpha'       => true,
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'choice'   => 'color',
				'element'  => 'body header#masthead.site-header.affix.custom-sticky #primary-menu >li >a:hover,
                               body header#masthead.site-header.affix.custom-sticky #primary-menu >li >span:hover,
                               body header.affix.custom-sticky .widget_shopping_cart .minicart_hover .cart-items-number:hover,
                               body header#masthead.affix.custom-sticky .menu-right a:hover,
                               body header#masthead.affix.custom-sticky .widget_shopping_cart .minicart_hover .cart-items-number span.wrapper-items-number,
                               header#masthead.affix.custom-sticky .menu-right a.btn-book,
                               header#masthead.affix.custom-sticky .menu-right a.btn-book:hover,                         
							   body header#masthead.site-header.affix.custom-sticky #primary-menu > li > a:hover, 
							   body header#masthead.site-header.affix.custom-sticky #primary-menu > li > span:not(.cart-items-number):hover,
							   body header#masthead.site-header.affix.custom-sticky #primary-menu > li.current-menu-item > a, 
							   body header#masthead.site-header.affix.custom-sticky #primary-menu > li.current-menu-parent > a, 
							   body header#masthead.site-header.affix.custom-sticky #primary-menu > li.current-menu-ancestor > a, 
							   body header#masthead.site-header.affix.custom-sticky #primary-menu > li.current-menu-item > span:not(.icon-toggle), 
							   body header#masthead.site-header.affix.custom-sticky #primary-menu > li.current-menu-parent > span:not(.icon-toggle), 
							   body header#masthead.site-header.affix.custom-sticky #primary-menu > li.current-menu-ancestor > span:not(.icon-toggle)',
				'property' => 'color',
			)
		),
		'active_callback' => array(
			array(
				'setting'  => 'sticky_menu_style',
				'operator' => '===',
				'value'    => 'custom',
			),
		),
	)
);