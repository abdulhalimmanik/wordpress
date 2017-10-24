<?php

// PPM Quickstart theme supports
if ( ! function_exists( 'ppm_quickstart_theme_supports' ) ) :
function ppm_quickstart_theme_supports(){
    
    load_theme_textdomain( 'ppm-quickstart', get_template_directory() . '/languages' );
    
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'post-image', 400, 400, true );
    
	register_nav_menus( array(
		'primary'   => __( 'Primary menu', 'ppm-quickstart' ),
	) );    
}
endif;
add_action('after_setup_theme', 'ppm_quickstart_theme_supports');


// Calling Theme files
function ppm_quickstart_theme_files(){
    
    wp_enqueue_style( 'ppm-quickstart-theme-bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array(), '3.3.7' );
    wp_enqueue_style( 'ppm-quickstart-theme-fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css', array(), '4.6.0' );
    wp_enqueue_style( 'ppm-quickstart-theme-slicknav', get_template_directory_uri() . '/css/slicknav.min.css', array(), '1.0' );
    wp_enqueue_style( 'ppm-quickstart-theme-style', get_stylesheet_uri() );
    
    wp_enqueue_style( 'ppm-quickstart-theme-responsive', get_template_directory_uri() . '/css/responsive.css', array(), '1.0' );
    
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'ppm-quickstart-bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array(), '20120206', true );
    wp_enqueue_script( 'ppm-quickstart-slicknav-js', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array(), '20120206', true );
    wp_enqueue_script( 'ppm-quickstart-main-js', get_template_directory_uri() . '/js/main.js', array(), '20120206', true );
    
    
    
    
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action('wp_enqueue_scripts', 'ppm_quickstart_theme_files'); 


function ppm_quickstart_ie_compitable_elements(){
    ?>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php //var_dump(cs_get_option('favicon')); ?>
    
    <?php if(cs_get_option('favicon')) : ?>
    <link rel="shortcut icon" type="image/png" href="<?php echo wp_get_attachment_image_src(cs_get_option('favicon'), 'thumbnail')[0]; ?>"/>
    <?php endif; ?>
    
    <?php
}
add_action('wp_head', 'ppm_quickstart_ie_compitable_elements'); 


// Includes
include_once('inc/widgets.php');
include_once('inc/shortcodes.php');
include_once('inc/custom-posts.php');
require_once dirname( __FILE__ ) .'/inc/cs-framework/cs-framework.php';

add_filter('widget_text', 'do_shortcode');