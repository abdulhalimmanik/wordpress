<?php
/**
 * Panel Page Title Bar
 * 
 * @package Hotel-WP
 */

thim_customizer()->add_panel(
    array(
        'id'       => 'page_title_bar',
        'title'    => esc_html__( 'Page Title', 'hotel-wp' ),
        'priority' => 30,
    )
);
