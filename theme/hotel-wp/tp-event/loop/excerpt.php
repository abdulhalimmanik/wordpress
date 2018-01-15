<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<div class="entry-content">
	<?php the_excerpt(); ?>
	<a class="tp_event_view-detail view-detail" href="<?php echo esc_url( get_the_permalink() ); ?>"> <i class="icomoon icon-up"></i><?php  esc_html_e( 'Read more', 'hotel-wp' ) ?></a>
</div>