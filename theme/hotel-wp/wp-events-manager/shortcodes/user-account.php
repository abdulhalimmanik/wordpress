<?php
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

$query = new WP_Query( $args );

wpems_print_notices();

if ( !is_user_logged_in() ) {
	printf( esc_html__( 'You are not <a href="%s">login</a>', 'hotel-wp' ), wpems_login_url() );
	return;
}
?>
<div class="thim-table-book-events">
	<?php
	if ( $query->have_posts() ) : ?>

		<table class="list-events">
			<thead>
			<th><?php esc_html_e( 'Booking ID', 'hotel-wp' ); ?></th>
			<th><?php esc_html_e( 'Events', 'hotel-wp' ); ?></th>
			<th><?php esc_html_e( 'Type', 'hotel-wp' ); ?></th>
			<th><?php esc_html_e( 'Cost', 'hotel-wp' ); ?></th>
			<th><?php esc_html_e( 'Quantity', 'hotel-wp' ); ?></th>
			<th><?php esc_html_e( 'Method', 'hotel-wp' ); ?></th>
			<th><?php esc_html_e( 'Status', 'hotel-wp' ); ?></th>
			</thead>
			<tbody>
			<?php foreach ( $query->posts as $post ): ?>

				<?php $booking = WPEMS_Booking::instance( $post->ID ) ?>
				<tr>
					<td><?php printf( '%s', wpems_format_ID( $post->ID ) ) ?></td>
					<td><?php printf( '<a href="%s">%s</a>', get_the_permalink( $booking->event_id ), get_the_title( $booking->event_id ) ) ?></td>
					<td><?php printf( '%s', floatval( $booking->price ) == 0 ? esc_html__( 'Free', 'hotel-wp' ) : esc_html__( 'Cost', 'hotel-wp' )  ) ?></td>
					<td><?php printf( '%s', wpems_format_price( floatval( $booking->price ), $booking->currency ) ) ?></td>
					<td><?php printf( '%s', $booking->qty ) ?></td>
					<td><?php printf( '%s', $booking->payment_id ? wpems_get_payment_title( $booking->payment_id ) : esc_html__( 'No payment.', 'hotel-wp' )  ) ?></td>
					<th><?php printf( '%s', wpems_booking_status( $booking->ID ) ); ?></th>
				</tr>

			<?php endforeach; ?>
			</tbody>
		</table>

		<?php
		$args = array(
			'base' => '%_%',
			'format' => '?paged=%#%',
			'total' => 1,
			'current' => 0,
			'show_all' => false,
			'end_size' => 1,
			'mid_size' => 2,
			'prev_next' => true,
			'prev_text' => esc_html__( 'Previous', 'hotel-wp' ),
			'next_text' => esc_html__( 'Next', 'hotel-wp' ),
			'type' => 'plain',
			'add_args' => false,
			'add_fragment' => '',
			'before_page_number' => '',
			'after_page_number' => ''
		);

		echo paginate_links( array(
			'base' => str_replace( 9999999, '%#%', esc_url( get_pagenum_link( 9999999 ) ) ),
			'format' => '?paged=%#%',
			'prev_text' => esc_html__( 'Previous', 'hotel-wp' ),
			'next_text' => esc_html__( 'Next', 'hotel-wp' ),
			'current' => max( 1, get_query_var( 'paged' ) ),
			'total' => $query->max_num_pages
		) );
		?>

	<?php endif; ?>
</div>
