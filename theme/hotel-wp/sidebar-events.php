<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Hotel-WP
 */
?>

<div id="secondary" class="widget-area col-sm-3 sidebar-events sticky-sidebar" role="complementary">
	<?php do_action('thim_sidebar_event_before'); ?>
	<?php if ( !dynamic_sidebar( 'sidebar_events' ) ) :
		dynamic_sidebar( 'sidebar_events' );
	endif; // end sidebar widget area ?>
	<?php do_action('thim_sidebar_event_after'); ?>
</div><!-- #secondary -->
