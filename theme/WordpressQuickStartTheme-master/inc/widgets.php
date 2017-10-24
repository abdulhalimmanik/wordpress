<?php 

function ppm_quickstart_widget_areas() {

	register_sidebar( array(
		'name' => __( 'Blog Sidebar', 'PerfectPoingMarketing' ),
		'id' => 'blog_sidebar',
		'before_widget' => '<div class="single-sidebar-item">',
		'after_widget' => '</div></div>',
		'before_title' => '<h2>',
		'after_title' => '</h2><div class="single-sidebar-inner">',
	) );

	register_sidebar( array(
		'name' => __( 'Right Sidebar', 'PerfectPoingMarketing' ),
		'id' => 'right_sidebar',
		'before_widget' => '<div class="single-sidebar-item">',
		'after_widget' => '</div></div>',
		'before_title' => '<h2>',
		'after_title' => '</h2><div class="single-sidebar-inner">',
	) );

}
add_action('widgets_init', 'ppm_quickstart_widget_areas');
