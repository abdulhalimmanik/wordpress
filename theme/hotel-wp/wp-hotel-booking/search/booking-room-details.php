<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

?>
<div class="hb-booking-room-details">
    <span class="hb_search_room_item_detail_price_close">
        <i class="fa fa-times"></i>
    </span>
	<?php $details = $room->get_booking_room_details(); ?>
	<table class="hb_search_room_pricing_price">
		<tbody>
		<?php foreach ( $details as $day => $info ): ?>
			<tr>
				<td class="hb_search_item_day"><?php printf( '%s', hb_date_to_name( $day ) ) ?></td>
				<td class="hb_search_item_total_description">
					<?php printf( 'x%d %s', $info['count'], esc_attr__( 'Night', 'hotel-wp' ) ) ?>
				</td>
				<td class="hb_search_item_price">
					<?php echo hb_format_price( round( $info['price'], 2 ) ); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
		<tfoot>
		<tr>
			<td class="hb_search_item_total_bold" colspan="2">
				<?php esc_attr_e( 'Total: ', 'hotel-wp' ) ?>
			</td>
			<td class="hb_search_item_price">
				<?php echo hb_format_price( $room->amount_singular ); ?>
			</td>
		</tr>
		<tr>
			<td class="vat" colspan="3">
				<?php
				if ( hb_price_including_tax() ) {
					esc_attr_e( '* vat is included', 'hotel-wp' );
				} else {
					esc_attr_e( '* vat is not included yet', 'hotel-wp' );
				}
				?>
			</td>
		</tr>
		</tfoot>
	</table>
</div>
