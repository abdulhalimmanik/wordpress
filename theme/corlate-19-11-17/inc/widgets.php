<?php
if ( ! function_exists( 'corlate_widgets_init' ) ) {
	/**
	 * Initializes themes widgets.
	 */
	function corlate_widgets_init() {
		register_sidebar( array(
			'name' => 'Footer Widgets',
			'id' => 'footer-widget',
			'description' => 'Footer widget',
			'before_widget' => '<div class="col-md-3 col-sm-6"><div class="widget">',
			'after_widget' => '</div></div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		) );

	}
} // endif function_exists( 'corlate_widgets_init' ).
add_action( 'widgets_init', 'corlate_widgets_init' );