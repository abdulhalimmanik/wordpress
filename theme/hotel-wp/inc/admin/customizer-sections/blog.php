<?php
/**
 * Panel Blog
 * 
 * @package Hotel-WP
 */

thim_customizer()->add_panel(
    array(
        'id'       => 'blog',
        'priority' => 42,
        'title'    => esc_html__( 'Blog', 'hotel-wp' ),
        'icon'        => ''
    )
);