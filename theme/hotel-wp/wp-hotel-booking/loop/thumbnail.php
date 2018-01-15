<?php
/**
 * Product loop thumbnail
 *
 * @author  ThimPress
 * @package Tp-hotel-booking/Templates
 * @version 1.1.4
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $hb_room;
global $hb_settings;
$gallery  = $hb_room->gallery;
$featured = $gallery ? array_shift( $gallery ) : false;

$thim_options = get_theme_mods();
$style_room   = isset( $thim_options['room_style'] ) ? $thim_options['room_style'] : 'style-1';
?>
<div class="media">
	<a href="<?php the_permalink(); ?>">
		<?php $hb_room->getImage( 'catalog' ); ?>
	</a>
	<?php if ( $style_room == 'style-2' ) { ?>
		<div class="actions">
			<?php
			if ( class_exists( 'WP_Hotel_Booking_Room' ) ) { ?>
				<div class="action-btn">
					<a href="#" data-id="<?php echo esc_attr( $hb_room->ID ) ?>" data-name="<?php echo esc_attr( $hb_room->name ) ?>" id="hb_room_load_booking_form" class="button book-now"><?php echo esc_html__( 'Book Now', 'hotel-wp' ); ?></a>
				</div>
			<?php } ?>
			<div class="action-btn">
				<a href="<?php the_permalink(); ?>" class="button readmore"><?php echo esc_html__( 'More Info', 'hotel-wp' ); ?></a>
			</div>
		</div>
	<?php } ?>
</div>