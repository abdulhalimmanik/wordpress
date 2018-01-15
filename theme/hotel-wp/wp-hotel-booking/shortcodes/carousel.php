<?php

if ( !defined( 'ABSPATH' ) ) {
	exit();
}

$sliderId = 'hotel_booking_slider_' . uniqid();
$items    = isset( $atts['number'] ) ? (int) $atts['number'] : 4;
?>
<div id="<?php echo esc_attr( $sliderId ); ?>" class="hb_room_carousel_container tp-hotel-booking">
	<?php if ( isset( $atts['title'] ) && $atts['title'] ): ?>
		<h3><?php echo esc_html( $atts['title'] ); ?></h3>
	<?php endif; ?>
	<!--text_link-->
	<?php if ( isset( $atts['text_link'] ) && $atts['text_link'] !== '' ): ?>
		<div class="text_link">
			<a href="<?php echo get_post_type_archive_link( 'hb_room' ); ?>"><?php echo esc_html( $atts['text_link'] ); ?></a>
		</div>
	<?php endif; ?>
	<div class="hb_room_carousel">

		<?php hotel_booking_room_loop_start(); ?>

		<div class="hb_room_slider owl-carousel owl-theme owl-loaded owl-drag">
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<?php hb_get_template_part( 'content', 'room' ); ?>
			<?php endwhile; // end of the loop. ?>
		</div>

		<?php hotel_booking_room_loop_end(); ?>

		<?php wp_reset_postdata(); ?>
	</div>
</div>
<script type="text/javascript">
	(function ($) {
		"use strict";
		$(document).ready(function () {
			var thimpress_hotel_booking_carousel = $('.hb_room_slider');
			thimpress_hotel_booking_carousel.owlCarousel({
				nav               : <?php echo esc_js( ( !isset( $atts['nav'] ) || $atts['nav'] ) ? 'true' : 'false' )  ?>,
				dots              : <?php echo esc_js( ( !isset( $atts['pagination'] ) || $atts['pagination'] ) ? 'true' : 'false' )  ?>,
				items             : <?php echo esc_js( $items ); ?>,
				autoplay          : true,
				autoplayHoverPause: true,
				loop              : true,
				autoHeight        : true
			})
		});
	})(jQuery);
</script>