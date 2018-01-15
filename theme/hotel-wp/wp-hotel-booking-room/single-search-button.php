<?php
/**
 * @Author: ducnvtt
 * @Date  :   2016-04-21 08:46:56
 * @Last  Modified by:   ducnvtt
 * @Last  Modified time: 2016-04-21 09:01:24
 */

if ( !defined( 'ABSPATH' ) ) {
	exit();
}

global $hb_room;
if ( !is_singular( 'hb_room' ) ) {
	return;
}
if ( class_exists( 'WP_Hotel_Booking_Room' ) ) {
	?>
	<a href="#" data-id="<?php echo esc_attr( $hb_room->ID ) ?>" data-name="<?php echo esc_attr( $hb_room->name ) ?>" class="hb_button hb_primary" id="hb_room_load_booking_form"><?php esc_html_e( 'Book Now', 'hotel-wp' ); ?></a>
<?php } ?>