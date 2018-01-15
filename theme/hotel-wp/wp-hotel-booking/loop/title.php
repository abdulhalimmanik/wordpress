<?php
/**
 * Product loop title
 *
 * @author  ThimPress
 * @package Tp-hotel-booking/Templates
 * @version 1.1.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


?>

<?php if( ! is_single() ): ?>
	  <h3 class="title"><a href="<?php the_permalink() ?>">
	  <?php else: ?>
			<h2 class="title"><a href="<?php the_permalink() ?>">
				<?php endif; ?>
				<?php the_title(); ?>
				<?php if( ! is_single() ): ?>
	  </a></h3>
	<?php else: ?>
			</a></h2>
<?php endif; ?>

