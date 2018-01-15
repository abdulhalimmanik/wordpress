<?php
/**
* Panel Event
*
* @package Hotel-WP
*/

thim_customizer()->add_panel(
    array(
    'id'       => 'event',
    'priority' => 45,
    'title'    => esc_html__( 'Events', 'hotel-wp' ),
    )
);