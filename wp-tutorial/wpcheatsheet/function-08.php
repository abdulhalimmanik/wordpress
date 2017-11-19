<?php
// 81. Member only content done!
		add_shortcode( 'member', 'member_check_shortcode' );
		 
		function member_check_shortcode( $atts, $content = null ) {
		         if ( is_user_logged_in() && !is_null( $content ) && !is_feed() )
		                return $content;
		        return '';
		}
		// uses
		[member]
		This text will be only displayed to registered users.
		[/member]

// 82. Require minimum word count to published post done!
		function minWord($content){
		        global $post;
		        $num = 100; //set this to the minimum number of words
		        $content = $post->post_content;
		        if (str_word_count($content) <  $num)
		            wp_die( __('Error: your post is below the minimum word count.') );
		}
		add_action('publish_post', 'minWord');

// 83. Browser detection body classes done!
		add_filter('body_class','browser_body_class');
		function browser_body_class($classes) {
		        global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
		        if($is_lynx) $classes[] = 'lynx';
		        elseif($is_gecko) $classes[] = 'gecko';
		        elseif($is_opera) $classes[] = 'opera';
		        elseif($is_NS4) $classes[] = 'ns4';
		        elseif($is_safari) $classes[] = 'safari';
		        elseif($is_chrome) $classes[] = 'chrome';
		        elseif($is_IE) $classes[] = 'ie';
		        else $classes[] = 'unknown';
		        if($is_iphone) $classes[] = 'iphone';
		        return $classes;
		}

// 84. Filter search results by post type done! not ok
		function search_posts_filter( $query ){
		    if ($query->is_search){
		        $query->set('post_type',array('post','custom_post_type1', 'custom_post_type2'));
		    }
		    return $query;
		}
		add_filter('pre_get_posts','search_posts_filter');

// 85. Set maximum post title length done! not ok
		function JebamaxWord($title){
		    global $post;
		    $title = $post->post_title;
		    if (str_word_count($title) >= 10 ) //set this to the maximum number of words
		        wp_die( __('Error: your post title is over the maximum word count.') );
		}
		add_action('publish_post', 'JebamaxWord');

// 86. Add auto logout period done! not working
		function logged_in( $expirein ) {
		   return 604800; // 1 week in seconds
		}
		add_filter( 'auth_cookie_expiration', 'logged_in' );

// 87. Style the tag cloud done!
		add_filter('widget_tag_cloud_args','style_tags');
		function style_tags($args) {
		$args = array(
			     'largest'    => '20',
			     'smallest'   => '20',
			     );
			return $args;
		}

// 88. Add pagination by using function done!
		function my_paginate_links() {
		global $wp_rewrite, $wp_query;
		$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
		  
		$pagination = array(
		  'base' => @add_query_arg('paged','%#%'),
		  'format' => '',
		  'total' => $wp_query->max_num_pages,
		  'current' => $current,
		  'prev_text' => __('« Previous'),
		  'next_text' => __('Next »'),
		  'end_size' => 1,
		  'mid_size' => 2,
		  'show_all' => true,
		  'type' => 'list'
		);
		  
		if ( $wp_rewrite->using_permalinks() )
		$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
		  
		if ( !empty( $wp_query->query_vars['s'] ) )
		$pagination['add_args'] = array( 's' => get_query_var( 's' ) );
		echo paginate_links( $pagination );
		}
		// uses
		 my_paginate_links();

 // 89. Maintenance mode using function done!
		function maintenace_mode() {
		 
		      if ( !current_user_can( 'edit_themes' ) || !is_user_logged_in() ) {wp_die('Maintenance.');}
		 
		}
		add_action('get_header', 'maintenace_mode');

// 90. To show post views done!
		function getPostViews($postID){
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count==''){
		    delete_post_meta($postID, $count_key);
		    add_post_meta($postID, $count_key, '0');
		    return "0 View";
		}
		return $count.' Views';
		}
		function setPostViews($postID) {
		    $count_key = 'post_views_count';
		    $count = get_post_meta($postID, $count_key, true);
		    if($count==''){
		        $count = 0;
		        delete_post_meta($postID, $count_key);
		        add_post_meta($postID, $count_key, '0');
		    }else{
		        $count++;
		        update_post_meta($postID, $count_key, $count);
		    }
		}
		 
		// Remove issues with prefetching adding extra views
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

		// Step-1: Use it within the single.php inside the wordpress loop
		setPostViews(get_the_ID());
		// Step-2: Display the number of views within your posts. Place this within the loop.
		echo getPostViews(get_the_ID());




