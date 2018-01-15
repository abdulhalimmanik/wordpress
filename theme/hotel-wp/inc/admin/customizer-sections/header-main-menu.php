<?php
/**
 * Section Header Main Menu
 *
 * @package Hotel-WP
 */

thim_customizer()->add_section(
	array(
		'id'       => 'header_main_menu',
		'title'    => esc_html__( 'Main Menu', 'hotel-wp' ),
		'panel'    => 'header',
		'priority' => 30,
	)
);

// Select font
thim_customizer()->add_field(
	array(
		'id'       => 'main_menu_font_family',
		'type'     => 'select',
		'label'    => esc_html__( 'Font Family', 'hotel-wp' ),
		'tooltip'  => esc_html__( 'Allows you to select font title or body. ', 'hotel-wp' ),
		'section'  => 'header_main_menu',
		'default'  => 'body',
		'priority' => 10,
		'multiple' => 0,
		'choices'  => array(
			'body'  => esc_html__( 'Body Font', 'hotel-wp' ),
			'title' => esc_html__( 'Title Font', 'hotel-wp' )
		),
	)
);

// Select All Fonts For Main Menu
thim_customizer()->add_field(
	array(
		'id'        => 'main_menu',
		'type'      => 'typography',
		'label'     => esc_html__( 'Fonts', 'hotel-wp' ),
		'tooltip'   => esc_html__( 'Allows you to select all font font properties for header. ', 'hotel-wp' ),
		'section'   => 'header_main_menu',
		'priority'  => 10,
		'default'   => array(
			'variant'        => '700',
			'font-size'      => '13px',
			'line-height'    => '1.6em',
			'color'          => '#4A4A4A',
			'text-transform' => 'uppercase',
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'choice'   => 'variant',
				'element'  => 'header#masthead.site-header .width-navigation .inner-navigation #primary-menu >li >a,
                               header#masthead.site-header .width-navigation .inner-navigation #primary-menu >li >span',
				'property' => 'font-weight',
			),
			array(
				'choice'   => 'font-size',
				'element'  => 'header#masthead.site-header #primary-menu >li >a,
                               header#masthead.site-header #primary-menu >li >span',
				'property' => 'font-size',
			),
			array(
				'choice'   => 'line-height',
				'element'  => 'header#masthead.site-header #primary-menu >li >a,
                               header#masthead.site-header #primary-menu >li >span',
				'property' => 'line-height',
			),
			array(
				'choice'   => 'color',
				'element'  => 'header#masthead.site-header #primary-menu >li >a,
                               header#masthead.site-header #primary-menu >li >span,
                               header .widget_shopping_cart .minicart_hover .cart-items-number,
							   body header#masthead .menu-right a,
							   body header#masthead.site-header .navigation .width-navigation .inner-navigation .navbar > li .icon-toggle',
				'property' => 'color',
			),
			array(
				'choice'   => 'text-transform',
				'element'  => 'header#masthead.site-header #primary-menu >li >a,
                               header#masthead.site-header #primary-menu >li >span',
				'property' => 'text-transform',
			),
		)
	)
);

// Text Link Hover
thim_customizer()->add_field(
	array(
		'id'        => 'main_menu_hover_color',
		'type'      => 'color',
		'label'     => esc_html__( 'Text Color Hover', 'hotel-wp' ),
		'tooltip'   => esc_html__( 'Allows you to select color for text link when hover text link . ', 'hotel-wp' ),
		'section'   => 'header_main_menu',
		'default'   => '#E7AD44',
		'priority'  => 16,
		'alpha'     => true,
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'choice'   => 'color',
				'element'  => 'body header#masthead.site-header .navigation .width-navigation .inner-navigation #primary-menu.navbar > li > a:hover, 
				body header#masthead.site-header .navigation .width-navigation .inner-navigation #primary-menu.navbar > li > span:hover,
				body header#masthead.site-header .navigation .width-navigation .inner-navigation .navbar > .current-menu-item a,
				body header#masthead.site-header .navigation .width-navigation .inner-navigation .navbar > .current_page_item a,
				body header#masthead .menu-right a.btn-book,
				body header#masthead .menu-right a.btn-book:hover,
				body .widget_shopping_cart .minicart_hover .cart-items-number span.wrapper-items-number,
				header .widget_shopping_cart .minicart_hover .cart-items-number:hover,
				body header#masthead .menu-right a:hover,',
				'property' => 'color',
			),
			array(
				'choice'   => 'background-color',
				'element'  => 'header#masthead #magic-line',
				'property' => 'background-color',
			),
		)
	)
);

// Show or Hide Magic Line
thim_customizer()->add_field(
	array(
		'id'          => 'show_magic_line',
		'type'        => 'switch',
		'label'       => esc_html__( 'Show magic line', 'hotel-wp' ),
		'tooltip'     => esc_html__( 'Allows you to show or hide magic line under main menu on header. Line color same as main menu color.', 'hotel-wp' ),
		'section'     => 'header_main_menu',
		'default'     => false,
		'priority'    => 18,
		'choices'     => array(
			true  	  => esc_html__( 'On', 'hotel-wp' ),
			false	  => esc_html__( 'Off', 'hotel-wp' ),
		),
	)
);