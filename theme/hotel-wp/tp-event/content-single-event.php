<article id="tp_event-<?php the_ID(); ?>" <?php post_class( 'tp_single_event' ); ?>>

	<?php
	/**
	 * tp_event_before_loop_room_summary hook
	 *
	 * @hooked tp_event_show_room_sale_flash - 10
	 * @hooked tp_event_show_room_images - 20
	 */
	do_action( 'tp_event_before_single_event' );

	?>

	<div class="entry-summary">

		<?php
		/**
		 * tp_event_single_event_thumbnail hook
		 */
		echo '<div class="tp-event-top">';
		do_action( 'tp_event_single_event_thumbnail' );

		/**
		 * tp_event_loop_event_countdown
		 */
		do_action( 'tp_event_loop_event_countdown' );
		echo '</div>';
		/**
		 * tp_event_single_event_title hook
		 */
		do_action( 'tp_event_single_event_title' );

		?>

	</div><!-- .summary -->

	<div class="tp-event-content">
		<?php
		/**
		 * tp_event_single_event_content hook
		 */
		do_action( 'tp_event_single_event_content' );
		?>
		<div class="tp-event-info">
			<div class="tp-info-box">
				<p class="heading">
					<i class="thim-color fa fa-clock-o"></i><?php esc_html_e( 'Start Time', 'hotel-wp' ); ?>
				</p>

				<p><?php echo tp_event_start( 'H:i a' ); ?></p>
				<p><?php echo tp_event_start( 'l, F j, Y' ); ?></p>
			</div>
			<div class="tp-info-box">
				<p class="heading">
					<i class="thim-color fa fa-flag"></i><?php esc_html_e( 'Finish Time', 'hotel-wp' ); ?>
				</p>

				<p><?php echo tp_event_end( 'H:i a' ); ?></p>
				<p><?php echo tp_event_end( 'l, F j, Y' ); ?></p>
			</div>

			<?php if ( tp_event_location() ): ?>
				<div class="tp-info-box">
					<p class="heading">
						<i class="thim-color fa fa-map-marker"></i><?php esc_html_e( 'Address', 'hotel-wp' ); ?>
					</p>

					<p><?php echo esc_html( tp_event_location() ); ?></p>
				</div>
			<?php endif; ?>
		</div>
	</div>

	<?php
	/**
	 * tp_event_after_loop_room hook
	 *
	 * @hooked tp_event_output_room_data_tabs - 10
	 * @hooked tp_event_upsell_display - 15
	 * @hooked tp_event_output_related_products - 20
	 */
	do_action( 'tp_event_after_single_event' );
	?>

</article><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'thim_social_share' ); ?>

