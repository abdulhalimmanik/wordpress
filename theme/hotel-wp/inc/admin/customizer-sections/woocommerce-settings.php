<?php
/**
 * Section Woocommerce Settings
 *
 * @package Hotel-WP
 */

thim_customizer()->add_section(
    array(
        'id'       => 'woocommerce_settings',
        'panel'    => 'woocommerce',
        'title'    => esc_html__( 'Settings', 'hotel-wp' ),
        'priority' => 10,
    )
);

// Numbers per page
thim_customizer()->add_field(
    array(
        'type'        => 'slider',
        'id'          => 'woocommerce_product_per_page',
        'label'       => esc_html__( 'Number Of Products Per Page', 'hotel-wp' ),
        'tooltip'     => esc_html__( 'Allows you to select a number to display product per archive page.', 'hotel-wp' ),
        'section'     => 'woocommerce_settings',
        'priority'    => 10,
        'default'     => 8,
        'choices'     => array(
            'min'  => '0',
            'max'  => '50',
            'step' => '1',
        ),
    )
);


//Grid Layout Columns
thim_customizer()->add_field(
    array(
        'type'        => 'select',
        'id'          => 'woocommerce_product_column',
        'label'       => esc_html__( 'Grid Columns', 'hotel-wp' ),
        'tooltip'     => esc_html__( 'Allows you to select a number make columns to display product per archive page.', 'hotel-wp' ),
        'section'     => 'woocommerce_settings',
        'default'     => '4',
        'priority'    => 20,
        'multiple'    => 0,
        'choices'     => array(
            '2' => esc_html__( '2', 'hotel-wp' ),
            '3' => esc_html__( '3', 'hotel-wp' ),
            '4' => esc_html__( '4', 'hotel-wp' ),
        ),
    )
);

//Product Related Columns
thim_customizer()->add_field(
    array(
        'type'        => 'select',
        'id'          => 'woocommerce_related_column',
        'label'       => esc_html__( 'Related Product Numbers', 'hotel-wp' ),
        'tooltip'     => esc_html__( 'Allows you to select a number make numbers to display related for single page.', 'hotel-wp' ),
        'section'     => 'woocommerce_settings',
        'default'     => '4',
        'priority'    => 30,
        'multiple'    => 0,
        'choices'     => array(
            '3' => esc_html__( '3', 'hotel-wp' ),
            '4' => esc_html__( '4', 'hotel-wp' ),
        ),
    )
);

// Enable or Disable Quickview
thim_customizer()->add_field(
    array(
        'id'          => 'enable_product_quickview',
        'type'        => 'switch',
        'label'       => esc_html__( 'Show QuickView', 'hotel-wp' ),
        'tooltip'     => esc_html__( 'Allows you to enable or disable quickview in shop page. ', 'hotel-wp' ),
        'section'     => 'woocommerce_settings',
        'default'     => true,
        'priority'    => 50,
        'choices'     => array(
            true  	  => esc_html__( 'On', 'hotel-wp' ),
            false	  => esc_html__( 'Off', 'hotel-wp' ),
        ),
    )
);