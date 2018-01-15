<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php if ( has_post_thumbnail() ): ?>

	<?php if ( is_single() ): ?>
		<?php
		$thumb = get_the_post_thumbnail( get_the_ID(), 'full' );
		if ( empty( $thumb ) ) {
			return;
		}
		echo '<a class="post-image" href="' . esc_url( get_permalink() ) . '">'. $thumb . '</a>';
		?>

	<?php else: ?>


			<?php thim_feature_image( 570, 500, true ); ?>

	<?php endif; ?>

<?php endif; ?>