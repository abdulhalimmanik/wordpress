<?php
/**
 * Panel Woocommerce
 *
 * @package Hotel-WP
 */

thim_customizer()->add_panel(
    array(
        'id'       => 'woocommerce',
        'title'    => esc_html__( 'WooCommerce', 'hotel-wp' ),
        'priority' => 65,
    )
);