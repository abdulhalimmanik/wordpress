<?php
/**
 * Other room - Show related room for single pages.
 *
 * @author        ThimPress
 * @package       Tp-hotel-booking/Templates
 * @version       0.9
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( !class_exists( 'HB_Room' ) )
	return;

$room    = HB_Room::instance( get_the_ID() );
$related = $room->get_related_rooms();
?>
<?php if ( $related->posts ): ?>
    <div class="hb_related_other_room">
        <h3 class="heading-title"><?php esc_html_e( 'Other Rooms', 'hotel-wp' ); ?></h3>
		<?php hotel_booking_room_loop_start(); ?>

		<?php while ( $related->have_posts() ) : $related->the_post(); ?>

			<?php hb_get_template_part( 'content', 'room' ); ?>

		<?php endwhile; // end of the loop. ?>

		<?php hotel_booking_room_loop_end(); ?>
    </div>
<?php endif; ?>
