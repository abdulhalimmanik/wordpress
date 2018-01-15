<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$date_show  = tp_event_get_time( 'd' );
$month_show = tp_event_get_time( 'F' );
?>

<div class="entry-header">
	<?php if( ! is_singular( 'tp_event' ) || ! in_the_loop() ): ?>
		<div class="time-from">
			<div class="date">
				<?php echo esc_html( $date_show ); ?>
			</div>
			<div class="month">
				<?php echo esc_html( $month_show ); ?>
			</div>
		</div>
		<h3 class="blog_title"><a href="<?php the_permalink() ?>">
	<?php else: ?>
		<h2 class="blog_title">
	<?php endif; ?>
			<?php the_title(); ?>
	<?php if( ! is_singular( 'tp_event' ) || ! in_the_loop() ): ?>
		</a></h3>
	<?php else: ?>
		</h2>
	<?php endif; ?>
</div>