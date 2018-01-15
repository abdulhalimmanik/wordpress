<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

do_action( 'hb_before_search_result' );
global $hb_search_rooms;

?>
<div id="hotel-booking-results">
	<?php if ( $results && ! empty( $hb_search_rooms['data'] ) ): ?>
		<?php hb_get_template( 'search/list.php', array( 'results' => $hb_search_rooms['data'], 'atts' => $atts ) ); ?>

		<nav class="rooms-pagination">
			<?php
			$links = paginate_links( apply_filters( 'hb_pagination_args', array(
				'base'      => add_query_arg( 'hb_page', '%#%' ),
				'format'    => '',
				'total'     => $hb_search_rooms['max_num_pages'],
				'current'   => $hb_search_rooms['page'],
				'prev_text' => '<i class="fa fa-angle-left"></i>',
				'next_text' => '<i class="fa fa-angle-right"></i>',
				'type'      => 'array',
				'end_size'  => 3,
				'mid_size'  => 3
			) ) );

			if ( $links ) : ?>
				<ul class="loop-pagination">
					<?php foreach ( $links as $link ) {
						echo '<li>' . $link . '</li>';
					} ?>
				</ul>
			<?php endif;
			?>
		</nav>

	<?php else: ?>
		<p><?php esc_html_e( 'No room found.', 'hotel-wp' ); ?></p>
		<p>
			<a href="<?php echo hb_get_url(); ?>"><?php esc_html_e( 'Search again!', 'hotel-wp' ); ?></a>
		</p>
	<?php endif; ?>
</div>
