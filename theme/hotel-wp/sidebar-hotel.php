<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Hotel-WP
 */

if ( !is_active_sidebar( 'sidebar_hotel' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area col-sm-3 sidebar-hotel sticky-sidebar" role="complementary">
	<?php do_action('thim_sidebar_before'); ?>
	<?php if ( !dynamic_sidebar( 'sidebar_hotel' ) ) :
		dynamic_sidebar( 'sidebar_hotel' );
	endif; // end sidebar widget area ?>
	<?php do_action('thim_sidebar_after'); ?>
</div><!-- #secondary -->
