<?php
/**
 * Corlate enqueue scripts
 *
 * 
 */

if ( ! function_exists( 'corlate_scripts' ) ) {
	/**
	 * Load theme's JavaScript sources.
	 */
	function corlate_scripts() {
		// Get the theme data.

		wp_enqueue_style( 'bootstrap-min', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array(), '3.0.3' );
		wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css', array(), '4.0.3' );
		wp_enqueue_style( 'animate-min', get_stylesheet_directory_uri() . '/css/animate.min.css', array(), '1.0' );
		wp_enqueue_style( 'prettyphoto', get_stylesheet_directory_uri() . '/css/prettyPhoto.css', array(), '1.0' );
		wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/css/main.css', array(), '1.0' );
		wp_enqueue_style( 'responsive', get_stylesheet_directory_uri() . '/css/responsive.css', array(), '1.0' );


		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'bootstrap-min-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), false , true);
		wp_enqueue_script( 'prettyPhoto-js', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array(), false , true);
		wp_enqueue_script( 'isotope-min-js', get_template_directory_uri() . '/js/jquery.isotope.min.js', array(), false , true);
		wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array(), false , true);
		wp_enqueue_script( 'wow-min-js', get_template_directory_uri() . '/js/wow.min.js', array(), false , true);
		
		/*if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}*/
	}
} // endif function_exists( 'corlate_scripts' ).

add_action( 'wp_enqueue_scripts', 'corlate_scripts' );


// theme supports
add_theme_support('post-thumbnails');
add_image_size('portfolio-thumb', 1400, 730, true);
add_image_size('slider-bg', 1400, 730, true);
add_image_size('hi-there',700 , 200 , true);

function ttft(){
	register_sidebar(
		array(
		'name' => 'right sidebar',
		'id' => 'right_sidebar',
		'before_widget' => '<div class="widget search">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

}
add_action('widgets_init' , 'ttft');


add_filter('widget_text' , 'do_shortcode');