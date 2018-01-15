<?php
/**
 * Section Breadcrumb
 *
 * @package Hotel-WP
 */

thim_customizer()->add_section(
    array(
        'id'       => 'breadcrumb',
        'panel'    => 'page_title_bar',
        'title'    => esc_html__( 'Breadcrumbs', 'hotel-wp' ),
        'priority' => 20,
    )
);

// Enable or Disable Breadcrumb
thim_customizer()->add_field(
    array(
        'id'          => 'disable_breadcrumb',
        'type'        => 'switch',
        'label'       => esc_html__( 'Hide Breadcrumb', 'hotel-wp' ),
        'tooltip'     => esc_html__( 'Allows you to HIDE breadcrumb on page title bar. ', 'hotel-wp' ),
        'section'     => 'breadcrumb',
        'default'     => false,
        'priority'    => 10,
        'choices'     => array(
            true  	  => esc_html__( 'On', 'hotel-wp' ),
            false	  => esc_html__( 'Off', 'hotel-wp' ),
        ),
    )
);

// Enter Icon To Show In Breadcrumb
$link_icon = 'http://fontawesome.io/icons/';

thim_customizer()->add_field(
    array(
        'id'          => 'breadcrumb_icon',
        'type'        => 'text',
        'label'       => esc_html__( 'Breadcrumb Icon', 'hotel-wp' ),
        'description' => sprintf( 'Enter any one character from the keyboard or <a href="%1$s" target="_blank" >FontAwesome</a> icon name. For example: 	&lt;i class="fa fa-angle-right"&gt; &lt;&#47i&gt; ,...', esc_url( $link_icon )),
        'section'     => 'breadcrumb',
        'default' => '',
        'priority'    => 20,
    )
);

thim_customizer()->add_field(
    array(
        'id'        => 'page_title_breadcrumb',
        'type'      => 'typography',
        'label'     => esc_html__( 'Breadcrumb Fonts', 'hotel-wp' ),
        'tooltip'   => esc_html__( 'Allows you to select font properties for breadcrumb. ', 'hotel-wp' ),
        'section'   => 'breadcrumb',
        'priority'  => 30,
        'default'   => array(
            'font-size'      => '12px',
            'color'          => '#9A9A9A',
        ),
        'transport' => 'postMessage',
        'js_vars'   => array(
            array(
                'choice'   => 'font-size',
                'element'  => 'body #breadcrumbs li span, 
                               body.woocommerce .page-title nav.woocommerce-breadcrumb span, 
                               body #breadcrumbs li a, 
                               body.woocommerce .page-title nav.woocommerce-breadcrumb a',
                'property' => 'font-size',
            ),
            array(
                'choice'   => 'color',
                'element'  => 'body #breadcrumbs li span, 
                               body.woocommerce .page-title nav.woocommerce-breadcrumb span, 
                               body #breadcrumbs li a, 
                               body.woocommerce .page-title nav.woocommerce-breadcrumb a',
                'property' => 'color',
            ),
        ),
    )
);

