<?php 

// 61. To use the WordPress limit excerpt done!
function new_excerpt_more( $more )
{
    return ' Load More';
}
function custom_excerpt_length( $length )
{
    return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 20);
add_filter('excerpt_more', 'new_excerpt_more');

// 62. To change any wp core file ok
function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/css/style-login.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

wishlist custom profile property

// 63. To remove login shake effect when error occurs on wp login ok
function wps_login_error() {
        remove_action('login_head', 'wp_shake_js', 12);
}
add_action('login_head', 'wps_login_error');

// 64. To add read more link after post excerpt see 61 done!

// 65. Add a Special Class for the First Post in the Loop done! 
add_filter( 'post_class', 'post_class_example' );
  
function post_class_example( $classes ) {
    global $wp_query;
    if ( 0 == $wp_query->current_post ) {
        $classes[] = 'first-post';
    }
    return $classes;
}

// 66. To Remove the URL Field in the Comment Form done!
add_filter( 'comment_form_default_fields', 'comment_form_default_fields_example' );
  
function comment_form_default_fields_example( $fields ) {
    unset( $fields['url'] );
    return $fields;
}

// 67. To Change the Default “Lost Password” Messages done!
add_filter( 'login_message', 'login_message_example' );
  
function login_message_example( $message ) {
    $action = $_REQUEST['action'];
    if( $action == 'lostpassword' ) {
        $message = '<p class="message">Enter your email address, then check your inbox for the "reset password" link!</p>';
        return $message;
    }
    return;
}

// 68. How to Add a Custom Admin Menu for plugin further study

// 69. Register Settings For a Plugin further study

// 70. How to Add a Custom Admin Menu for plugin further study




 
