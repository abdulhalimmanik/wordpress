<?php
/**
 * @Author: ducnvtt
 * @Date:   2016-04-21 09:15:52
 * @Last Modified by:   ducnvtt
 * @Last Modified time: 2016-04-21 16:05:07
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}
global $post;
if ( ! $post ) {
	return;
}
?>

<!--Single search form-->
<script type="text/html" id="tmpl-hb-room-load-form-cart">

	<form action="POST" name="hb-search-results" class="hb-search-room-results hotel-booking-search hotel-booking-single-room-action">
		<div class="hb-booking-room-form-head">
			<h2 class="hb-room-name">{{data.room_name}}</h2>
			<p class="description"><?php esc_html_e( 'Please select number of room and packages(optional)', 'hotel-wp' ) ?></p>
		</div>

		<div class="hb-search-results-form-container">
			<?php do_action( 'hotel_booking_room_before_quantity', $post ); ?>
			<# if ( typeof data.qty !== 'undefined' ) { #>
				<div class="hb-booking-room-form-group">
					<div class="hb-booking-room-form-field hb-form-field-input">
						<div class="hb-room-meta">
							<div class="meta-item hb_search_quantity">
								<select name="hb-num-of-rooms" class="number_room_select hotel_booking_invalid_quantity">
									<option value="0"><?php esc_html_e( 'Quantity', 'hotel-wp' ); ?></option>
									<# for( var i = 1; i <= data.qty; i++ ) { #>
										<option value="{{ i }}">{{ i }}</option>
									<# } #>
								</select>
							</div>
						</div>
					</div>
				</div>
			<# } #>
			<?php do_action( 'hotel_booking_room_after_quantity', $post ); ?>
		</div>

		<div class="hb-booking-room-form-footer">
			<a href="#" data-template="hb-room-load-form" class="hb_previous_step hb_button"><?php esc_html_e( 'Previous', 'hotel-wp' ); ?></a>
			<input type="hidden" name="check_in_date_text" value="{{ data.check_in_date_text }}" />
			<input type="hidden" name="check_out_date_text" value="{{ data.check_out_date_text }}" />
			<input type="hidden" name="check_in_date" value="{{ data.check_in_date }}" />
			<input type="hidden" name="check_out_date" value="{{ data.check_out_date }}" />
			<input type="hidden" name="room-id" value="{{ data.room_id }}" />
			<input type="hidden" name="action" value="hotel_booking_ajax_add_to_cart"/>
			<input type="hidden" name="is_single" value="1" />
			<?php wp_nonce_field( 'hb_booking_nonce_action', 'nonce' ); ?>
			<?php do_action( 'hotel_booking_loop_after_item', $post->ID ); ?>
			<button type="submit" class="hb_add_to_cart hb_button"><?php esc_html_e( 'Add To Cart', 'hotel-wp' ); ?></button>
		</div>
	</form>

</script>
