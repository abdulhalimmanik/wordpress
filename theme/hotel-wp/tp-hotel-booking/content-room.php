<?php
/**
 * The template for displaying room content in the single-room.php template
 *
 * Override this template by copying it to yourtheme/tp-hotel-booking/content-single-room.php
 *
 * @author        ThimPress
 * @package       tp-hotel-booking/templates
 * @version       1.1.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $hb_settings, $hb_room;
$thim_options  = get_theme_mods();
$style_room = isset($thim_options['room_style']) ? $thim_options['room_style'] : 'style-1';

$col   = 12 / $hb_settings->get( 'catalog_number_column', 4 );
$class = 'col-xs-6 col-md-' . $col;

?>

<div id="room-<?php the_ID(); ?>" <?php post_class( $class ); ?>>

	<?php
	/**
	 * hotel_booking_before_loop_room_summary hook
	 *
	 * @hooked hotel_booking_show_room_sale_flash - 10
	 * @hooked hotel_booking_show_room_images - 20
	 */
	do_action( 'hotel_booking_before_loop_room_item' );
	?>

	<div class="summary entry-summary">

		<?php
		/**
		 * hotel_booking_loop_room_thumbnail hook
		 */
		do_action( 'hotel_booking_loop_room_thumbnail' );
		?>
		<div class="content">
			<?php

			/**
			 * hotel_booking_loop_room_title hook
			 */
			do_action( 'hotel_booking_loop_room_title' );

			/**
			 * hotel_booking_loop_room_price hook
			 */
			do_action( 'hotel_booking_loop_room_price' );

			if($style_room == 'style-2') {
				/**
				 * rooms description
				 */
				echo '<div class="description">'.thim_excerpt(17).'</div>';
			}

			/**
			 * hotel_booking_loop_room_price hook
			 */
			do_action( 'hotel_booking_loop_room_rating' );
			?>
		</div>

	</div><!-- .summary -->

	<?php
	/**
	 * hotel_booking_after_loop_room_item hook
	 *
	 * @hooked hotel_booking_show_room_sale_flash - 10
	 * @hooked hotel_booking_show_room_images - 20
	 */
	do_action( 'hotel_booking_after_loop_room_item' );
	?>

</div>

<?php do_action( 'hotel_booking_after_loop_room' ); ?>
