<?php

function thim_get_all_plugins_require($plugins)
{
    return array(
        array(
            'name' => 'Visual Composer',
            'slug' => 'js_composer',
            'source' => 'https://plugins.thimpress.com/downloads/js_composer.zip',
            'required' => true,
            'version' => '5.1.1',
            'icon' => THIM_URI . 'assets/images/plugins/js_composer.png',
        ),
        array(
            'name' => 'WP Hotel Booking',
            'slug' => 'wp-hotel-booking',
        ),
        array(
            'name' => 'WP Events Manager',
            'slug' => 'wp-events-manager',
        ),
        array(
            'name' => 'WP Events Manager - WooCommerce Payment ',
            'slug' => 'wp-events-manager-woo-payment',
            'source' => 'https://plugins.thimpress.com/downloads/eduma-plugins/wp-events-manager-woo-payment.zip',
            'required' => false,
            'version' => '2.2',
            'description' => 'Support paying for a booking with the payment methods provided by Woocommerce',
            'add-on' => true,
        ),
        array(
            'name' => 'Thim Testimonials',
            'slug' => 'thim-testimonials',
            'source' => 'https://plugins.thimpress.com/downloads/thim-testimonials.zip',
            'version' => '1.3.1',
        ),
        array(
            'name' => 'Thim Hotel WP Shortcodes',
            'slug' => 'thim-hotel-wp-shortcodes',
            'source' => THIM_DIR . 'inc/plugins/thim-hotel-wp-shortcodes.zip',
            'required' => true,
            'version' => '1.1.1',
        ),
        array(
            'name' => 'WP Hotel Booking Authorize Sim',
            'slug' => 'wp-hotel-booking-authorize-sim',
            'source' => 'https://plugins.thimpress.com/downloads/wp-hotel-booking-addons/wp-hotel-booking-authorize-sim.zip',
            'version' => '1.7',
            'add-on' => true,
            'icon' => THIM_URI . 'assets/images/plugins/hotelbooking-addon-authorize.png',
        ),
        array(
            'name' => 'WP Hotel Booking Block',
            'slug' => 'wp-hotel-booking-block',
            'source' => 'https://plugins.thimpress.com/downloads/wp-hotel-booking-addons/wp-hotel-booking-block.zip',
            'version' => '1.7',
            'add-on' => true,
            'icon' => THIM_URI . 'assets/images/plugins/hotelbooking-addon-block.png',
        ),
        array(
            'name' => 'WP Hotel Booking Coupon',
            'slug' => 'wp-hotel-booking-coupon',
            'source' => 'https://plugins.thimpress.com/downloads/wp-hotel-booking-addons/wp-hotel-booking-coupon.zip',
            'version' => '1.7',
            'add-on' => true,
            'icon' => THIM_URI . 'assets/images/plugins/hotelbooking-addon-coupon.png',
        ),
        array(
            'name' => 'WP Hotel Booking Report',
            'slug' => 'wp-hotel-booking-report',
            'source' => 'https://plugins.thimpress.com/downloads/wp-hotel-booking-addons/wp-hotel-booking-report.zip',
            'version' => '1.7',
            'add-on' => true,
            'icon' => THIM_URI . 'assets/images/plugins/hotelbooking-addon-report.png',
        ),
        array(
            'name' => 'WP Hotel Booking Stripe',
            'slug' => 'wp-hotel-booking-stripe',
            'source' => 'https://plugins.thimpress.com/downloads/wp-hotel-booking-addons/wp-hotel-booking-stripe.zip',
            'version' => '1.7',
            'add-on' => true,
            'icon' => THIM_URI . 'assets/images/plugins/hotelbooking-addon-stripe.png',
        ),
        array(
            'name' => 'WP Hotel Booking WooCommerce',
            'slug' => 'wp-hotel-booking-woocommerce',
            'source' => 'https://plugins.thimpress.com/downloads/wp-hotel-booking-addons/wp-hotel-booking-woocommerce.zip',
            'version' => '1.7',
            'add-on' => true,
            'icon' => THIM_URI . 'assets/images/plugins/hotelbooking-addon-woocommerce.png',
        ),
        array(
            'name' => 'WP Hotel Booking WPML Support',
            'slug' => 'wp-hotel-booking-wpml-support',
            'source' => 'https://plugins.thimpress.com/downloads/wp-hotel-booking-addons/wp-hotel-booking-wpml-support.zip',
            'version' => '1.7',
            'add-on' => true,
            'icon' => THIM_URI . 'assets/images/plugins/hotelbooking-addon-wpml.png',
        ),
        array(
            'name' => 'WooCommerce',
            'slug' => 'woocommerce',
        ),
        array(
            'name' => 'Widget Logic',
            'slug' => 'widget-logic',
        ),
        array(
            'name' => 'MailChimp',
            'slug' => 'mailchimp-for-wp',
        ),
        array(
            'name' => 'Contact Form 7',
            'slug' => 'contact-form-7',
        ),
        array(
            'name' => 'Instagram Feed',
            'slug' => 'instagram-feed',
        ),
        array(
            'name' => 'WP Hotel Booking Room',
            'slug' => 'wp-hotel-booking-room',
            'source' => 'https://plugins.thimpress.com/downloads/wp-hotel-booking-addons/wp-hotel-booking-room.zip',
            'version' => '1.7.3',
            'icon' => THIM_URI . 'assets/images/plugins/hotelbooking-addon-room.png',
        ),
        array(
            'name' => 'Slider Revolution',
            'slug' => 'revslider',
            'source' => 'https://plugins.thimpress.com/downloads/revslider.zip',
            'version' => '5.4.1',
            'icon' => THIM_URI . 'assets/images/plugins/revslider.png',
        ),
        array(
            'name' => 'Hotel WP Demo Data',
            'slug' => 'hotel-wp-demo-data',
            'version' => '1.0.0',
            'description' => 'Demo data for the theme Hotel WP.',
            'premium' => true
        ),
    );
}

add_action('thim_core_get_all_plugins_require', 'thim_get_all_plugins_require');


function thim_get_core_require()
{
    $thim_core = array(
        'name' => 'Thim Core',
        'slug' => 'thim-core',
        'version' => '1.1.0.1',
        'source' => 'https://thimpresswp.github.io/thim-core/dist/thim-core.zip',
    );

    return $thim_core;
}


function thim_envato_item_id()
{
    return '18828322';
}

add_filter('thim_envato_item_id', 'thim_envato_item_id');