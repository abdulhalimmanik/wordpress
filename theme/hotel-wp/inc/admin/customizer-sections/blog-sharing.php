<?php
/**
 * Section Sharing
 * 
 * @package Hotel-WP
 */

thim_customizer()->add_section(
    array(
        'id'       => 'sharing',
        'panel'    => 'blog',
        'title'    => esc_html__( 'Social Share', 'hotel-wp' ),
        'priority' => 21,
    )
);

// Sharing Group
thim_customizer()->add_field(
    array(
        'id'       => 'group_sharing',
        'type'     => 'sortable',
        'label'    => esc_html__( 'Sortable Buttons Sharing', 'hotel-wp' ),
        'tooltip'  => esc_html__( 'Click on eye icons to show or hide buttons. Use drag and drop to change the position of social share icons..', 'hotel-wp' ),
        'section'  => 'sharing',
        'priority' => 10,
        'default'  => array(
            'facebook',
            'twitter',
            'pinterest',
            'google',
            'fancy'
        ),
        'choices'  => array(
            'facebook'  => esc_html__( 'Facebook', 'hotel-wp' ),
            'twitter'   => esc_html__( 'Twitter', 'hotel-wp' ),
            'pinterest' => esc_html__( 'Pinterest', 'hotel-wp' ),
            'google'    => esc_html__( 'Google Plus', 'hotel-wp' ),
            'fancy'     => esc_html__( 'Fancy', 'hotel-wp' ),
        ),
    )
);

