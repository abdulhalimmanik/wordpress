<?php
/**
 * Section Copyright
 *
 * @package Hotel-WP
 */

thim_customizer()->add_section(
    array(
        'id'       => 'copyright',
        'title'    => esc_html__( 'Copyright', 'hotel-wp' ),
        'panel'    => 'footer',
        'priority' => 50,
    )
);

// Enable Copyright Text
thim_customizer()->add_field(
    array(
        'type'     => 'switch',
        'id'       => 'copyright_bar',
        'label'    => esc_html__( 'Show Copyright Text', 'hotel-wp' ),
        'tooltip'  => esc_html__( 'Turn on to display the copyright bar.', 'hotel-wp' ),
        'section'  => 'copyright',
        'default'  => false,
        'priority' => 10,
        'choices'  => array(
            true  => esc_html__( 'On', 'hotel-wp' ),
            false => esc_html__( 'Off', 'hotel-wp' ),
        ),
    )
);

// Enable Copyright Menu
thim_customizer()->add_field(
    array(
        'type'     => 'switch',
        'id'       => 'copyright_menu',
        'label'    => esc_html__( 'Copyright Menu', 'hotel-wp' ),
        'tooltip'  => esc_html__( 'Turn on to display the copyright menu.', 'hotel-wp' ),
        'section'  => 'copyright',
        'default'  => true,
        'priority' => 12,
        'choices'  => array(
            true  => esc_html__( 'On', 'hotel-wp' ),
            false => esc_html__( 'Off', 'hotel-wp' ),
        ),
    )
);

// Copyright Background Color
thim_customizer()->add_field(
    array(
        'id'          => 'copyright_background_color',
        'type'        => 'color',
        'label'       => esc_html__( 'Background Color', 'hotel-wp' ),
        'tooltip'     => esc_html__( 'Allows you to choose background color for your copyright area. ', 'hotel-wp' ),
        'section'     => 'copyright',
        'default'     => '#f7f4f2',
        'priority'    => 15,
        'alpha'       => true,
        'transport' => 'postMessage',
        'js_vars'   => array(
            array(
                'choice'   => 'color',
                'element'  => 'footer#colophon .copyright-area',
                'property' => 'background-color',
            )
        )
    )
);

// Copyright Text Color, Link Color, Link Hover Colo
thim_customizer()->add_field(
    array(
        'type'      => 'multicolor',
        'id'        => 'font_copyright_color',
        'label'     => esc_html__( 'Colors', 'hotel-wp' ),
        'section'   => 'copyright',
        'priority'  => 20,
        'choices'   => array(
            'title' => esc_html__( 'Border', 'hotel-wp' ),
            'text'  => esc_html__( 'Text', 'hotel-wp' ),
            'link'  => esc_html__( 'Link', 'hotel-wp' ),
            'hover' => esc_html__( 'Hover', 'hotel-wp' ),
        ),
        'default'   => array(
            'title' => '#ffffff',
            'text'  => '#8a8a8a',
            'link'  => '#8a8a8a',
            'hover' => '#e7ad44',
        ),
        'transport' => 'postMessage',
        'js_vars'   => array(
            array(
                'choice'   => 'title',
                'element'  => 'body footer#colophon .copyright-area .copyright-content',
                'property' => 'border-top-color',
            ),
            array(
                'choice'   => 'text',
                'element'  => 'footer#colophon .copyright-area .copyright-content',
                'property' => 'color',
            ),
            array(
                'choice'   => 'link',
                'element'  => 'footer#colophon .copyright-area .copyright-content a',
                'property' => 'color',
            ),
            array(
                'choice'   => 'hover',
                'element'  => 'footer#colophon .copyright-area .copyright-content a:hover',
                'property' => 'color',
            ),
        ),
    )
);

// Enter Text For Copyright
$link = 'http://thimpress.com';

thim_customizer()->add_field(
    array(
        'type'            => 'textarea',
        'id'              => 'copyright_text',
        'label'           => esc_html__( 'Copyright Text', 'hotel-wp' ),
        'tooltip'         => esc_html__( 'Enter the text that displays in the copyright bar. HTML markup can be used.', 'hotel-wp' ),
        'section'         => 'copyright',
        'default'         => sprintf( 'Designed by <a href="$1$s">ThimPress</a>. Powered by WordPress.', esc_url( $link )),
        'priority'        => 100,
        'transport'       => 'postMessage',
        'js_vars'         => array(
            array(
                'element'  => '.copyright-text',
                'function' => 'html',
            ),
        ),
        'active_callback' => array(
            array(
                'setting'  => 'copyright_bar',
                'operator' => '==',
                'value'    => true,
            ),
        ),
    )
);