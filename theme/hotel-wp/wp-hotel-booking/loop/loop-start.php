<?php
/**
 * Room Loop Start
 *
 * @author 		ThimPress
 * @package 	Tp-hotel-booking/Templates
 * @version     1.1.4
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit();
}

global $hb_settings;
$thim_options  = get_theme_mods();
$style_room = isset($thim_options['room_style']) ? $thim_options['room_style'] : 'style-1';

?>

<div class="rooms tp-hotel-booking hb-catalog-column-<?php echo esc_attr( $hb_settings->get('catalog_number_column', 4) ) ?> row <?php echo esc_attr($style_room); ?>">