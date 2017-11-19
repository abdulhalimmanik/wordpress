<?php

// 71. Options Page for a Plugin under Settings //further study
// 72. To Create a Simple WordPress Theme Settings Page //further study
// 73. To Automatically Create Meta Description From Content done! problem
		function create_meta_desc() {
		    global $post;
		if (!is_single()) { return; }
		    $meta = strip_tags($post->post_content);
		    $meta = strip_shortcodes($meta);
		    $meta = str_replace(array("\n", "\r", "\t"), ' ', $meta);
		    $meta = substr($meta, 0, 125);
		    echo "<meta name='description' content='$meta' />";
		}
		add_action('wp_head', 'create_meta_desc');

// 74. To Display Breadcrumbs done!
		function the_breadcrumb() {
		    if (!is_home()) {
		        echo '<a href="';
		        echo get_option('home');
		        echo '">';
		        bloginfo('name');
		        echo "</a>  ";
		        if (is_category() || is_single()) {
		            the_category('title_li=');
		            if (is_single()) {
		                echo "  ";
		                the_title();
		            }
		        } elseif (is_page()) {
		            echo the_title();
		        }
		    }
		}
		// Go to your single.php page and add the following code anywhere you want to display the breadcrumbs.
		the_breadcrumb();

// 75. If current user done! not working
		global $current_user;
		get_currentuserinfo();
		 
		if ($current_user->ID == '') { 
		    //show nothing to user
		}
		else { 
		    //write code to show menu here
		}

// 76. Logged In Users Current Info done!
		global $current_user;
		get_currentuserinfo();

		echo 'Username: ' . $current_user->user_login . "\n";
		echo 'User email: ' . $current_user->user_email . "\n";
		echo 'User first name: ' . $current_user->user_firstname . "\n";
		echo 'User last name: ' . $current_user->user_lastname . "\n";
		echo 'User display name: ' . $current_user->display_name . "\n";
		echo 'User ID: ' . $current_user->ID . "\n";

// 77. Remove width & height from images in posts ok
		add_filter( 'post_thumbnail_html', 'remove_wps_width_attribute', 10 );
		add_filter( 'image_send_to_editor', 'remove_wps_width_attribute', 10 );
		  
		function remove_wps_width_attribute( $html ) {
		    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
		    return $html;
		}

// 78. Automatically add the Google +1 button done!
		add_filter('the_content', 'google_plusone');
		function google_plusone($content) {
		        $content = $content.'<div class="plusone"><g:plusone size="tall" href="'.get_permalink().'"></g:plusone></div>';
		        return $content;
		}
		add_action ('wp_enqueue_scripts','google_plusone_script');
		function google_plusone_script() {
		        wp_enqueue_script('google-plusone', 'https://apis.google.com/js/plusone.js', array(), null);
		}

// 79. How to loop posts from a specific category in homepage done! not working
		add_action( 'pre_get_posts', function ( $q ) {
		 
		    if( $q->is_home() && $q->is_main_query() ) {
		 
		        $q->set( 'cat', CATEGORY_ID );
		        $q->set( 'posts_per_page', 3 );
		 
		    }
		 
		});


// 80. Automatically Disable comments on posts over one month ok
		function close_comments( $posts ) {
		    if ( !is_single() ) { return $posts; }
		     if ( time() - strtotime( $posts[0]->post_date_gmt ) > ( 30 * 24 * 60 * 60 ) ) {
		     $posts[0]->comment_status = 'closed';
		     $posts[0]->ping_status    = 'closed';
		  }
		  return $posts;
		}
		add_filter( 'the_posts', 'close_comments' );

	