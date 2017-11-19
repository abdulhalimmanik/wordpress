<?php
// 51. To use setting option
	function options_page_function_name(){
	 
	     add_options_page( 'manu_title', 'menu name', 'manage_options', 'option-page', 'another_page_function_name', plugins_url( 'plugin_folder_name/images/icon.png' ),8 );
	 
	              
	}
	add_action('admin_menu','options_page_function_name');
	 
	  // 4. Add setting option by used function. 
	function register_settings_function_name() {
	// Register settings and call sanitation functions
	// 4. Add register setting. 
	    register_setting( 'register_settings_name', 'demo_options_default', 'jeba_validate_options' );
	}
	 
	add_action( 'admin_init', 'register_settings_function_name' );  
	 
	 
	       
	// 2. Add default value array. 
	$demo_options_default = array(
	    'jeba_use_demo' => 300,
	    'jeba_control_radio_mode' => false,
	);
	 
	  /*radio bottom option */
	     
	    $jeba_control_radio_mode=array(
	      'scroll_up_radio_yes'=>array(
	        'value'=>'true',
	        'label'=>'Active your single items'
	      ),  
	 
	      'scroll_up_radio_no'=>array(
	        'value'=>'false',
	        'label'=>'Deactive your single items'
	      ),     
	     
	    );
	 
	    if ( is_admin() ) : // 3. Load only if we are viewing an admin page 
	 
	 //1.2
	 function another_page_function_name(){?>
	  
	 <?php // 5.1. Add settings API hook under form action.  ?>
	<?php global $demo_options_default,$jeba_control_radio_mode ;
	 
	 
	if ( ! isset( $_REQUEST['updated'] ) )
	    $_REQUEST['updated'] = false; // This checks whether the form has just been submitted. 
	 
	?>
	      
	      
	   <div class="wrap">
	      <h2>scroll up setting</h2>
	                  <?php if ( false !== $_REQUEST['updated'] ) : ?>
	        <div class="updated fade"><p><strong><?php _e( 'Options saved' ); ?></strong></p></div>
	        <?php endif; // 5.2. If the form has just been submitted, this shows the notification ?>  
	       
	    <form action="options.php" method="post">  
	    <?php // 6.1 Add settings API hook under form action.  ?>
	<?php $settings = get_option( 'demo_options_default', $demo_options_default ); ?>
	 
	<?php settings_fields( 'register_settings_name' );
	/* 6.2  This function outputs some hidden fields required by the form,
	including a nonce, a unique number used to ensure the form has been submitted from the admin page and not somewhere else, very important for security */ ?>
	 
	    <table class="form-table">
	        <tbody>
	            <tr valign="top">
	                <th scope="row"><label for="jeba_use_demo">scroll Distance</label></th>
	                    <td>
	                        <input type="text" class="" value="<?php echo stripslashes($settings['jeba_use_demo']); ?>" id="jeba_use_demo" name="demo_options_default[jeba_use_demo]"/><p class="description">Distance from top/bottom before showing element (px)<br/>Best position is 200px to 300px</p>
	                    </td>
	            </tr>
	             
	            <tr valign="top">
	                <th scope="row"><label for="jeba_control_radio_mode">single items mode</label></th>
	                    <td>
	                    <?php foreach ( $jeba_control_radio_mode as $activate): ?>
	                    <input type="radio" id="<?php echo $activate['value']; ?>" name="demo_options_default[jeba_control_radio_mode]"  value="<?php esc_attr_e($activate['value']); ?>"<?php checked($settings['jeba_control_radio_mode'],$activate['value']); ?>  />
	                    <label for="<?php echo $activate['value']; ?>"><?php echo $activate ['label']; ?></label>
	                    <p class="description">You can add single items true or false</p><br/>
	                    <?php endforeach; ?>
	                </td>
	            </tr>
	         
	    </tbody>
	 
	</table>
	 
	 
	<p class="submit">
	<input type="submit" value="Save Changes" class="button button-primary" id="submit" name="submit">
	</p>
	 
	</form>
	                
	</div>
	      
	      
	    <?php 
	     }
	  // 7. Add validate options. 
	function jeba_validate_options( $input ) {
	    global $demo_options_default,$jeba_control_radio_mode;
	 
	    $settings = get_option( 'demo_options_default', $demo_options_default );
	    $input['jeba_use_demo']=wp_filter_post_kses($input['jeba_use_demo']);
	     // We strip all tags from the text field, to avoid vulnerablilties like XSS
	    $prev=$settings['layout_only'];
	    if(!array_key_exists($input['layout_only'],$jeba_control_radio_mode))
	    $input['layout_only']=$prev;
	 
	 return $input;
	}
	    endif;  //3. EndIf is_admin()   
	     
	// 8.data danamic
	function jeba_use_activator(){?>
	<?php global $demo_options_default;
	 
	$bappiscroll_up_settings=get_option('demo_options_default','$demo_options_default'); ?>
	 
	    <!--use this where need dynamic data-->
	    <?php echo $bappiscroll_up_settings['jeba_use_demo']; ?>
	    <?php echo $bappiscroll_up_settings['jeba_control_radio_mode']; ?>
	 
	<?php
	}
	 
	add_action('wp_head','jeba_use_activator');

// 52. How to register shortcode in wordpress
	// Single shortcode
	function single_shortcode( $atts, $content = null  ) {
	 
	    return '<div class="singe_shortcode_wrapper">'.do_shortcode($content).'</div>';
	 
	}   
	add_shortcode('single_shortcode', 'single_shortcode');
	// Shortcode with attributes
	function shortcode_with_attributes( $atts, $content = null  ) {
	 
	    extract( shortcode_atts( array(
	        'attribute' => '',
	        'another' => ''
	    ), $atts ) );
	 
	    return '
	        <div class="shortcode_wrapper">
	            <h2>'.$attribute.'</h2>
	            '.$another.'
	        </div>
	    ';
	}   
	add_shortcode('shortcode_name', 'shortcode_with_attributes');
// 53. WP Plugin QuickStart Pack 
// 54. To Change Howdy text From WP Admin Bar
	add_action( 'admin_bar_menu', 'wp_admin_bar_my_custom_account_menu', 11 );
	 
	function wp_admin_bar_my_custom_account_menu( $wp_admin_bar ) {
	$user_id = get_current_user_id();
	$current_user = wp_get_current_user();
	$profile_url = get_edit_profile_url( $user_id );
	 
	if ( 0 != $user_id ) {
	/* Add the "My Account" menu */
	$avatar = get_avatar( $user_id, 28 );
	$howdy = sprintf( __('Welcome, %1$s'), $current_user->display_name );
	$class = empty( $avatar ) ? '' : 'with-avatar';
	 
	$wp_admin_bar->add_menu( array(
	'id' => 'my-account',
	'parent' => 'top-secondary',
	'title' => $howdy . $avatar,
	'href' => $profile_url,
	'meta' => array(
	'class' => $class,
	),
	) );
	 
	}
	}

// 55. To Email User login support besides username
function dr_email_login_authenticate( $user, $username, $password ) {
    if ( is_a( $user, 'WP_User' ) )
        return $user;
 
    if ( !empty( $username ) ) {
        $username = str_replace( '&', '&amp;', stripslashes( $username ) );
        $user = get_user_by( 'email', $username );
        if ( isset( $user, $user->user_login, $user->user_status ) && 0 == (int) $user->user_status )
            $username = $user->user_login;
    }
 
    return wp_authenticate_username_password( null, $username, $password );
}
remove_filter( 'authenticate', 'wp_authenticate_username_password', 20, 3 );
add_filter( 'authenticate', 'dr_email_login_authenticate', 20, 3 );

// 56. Get top commenter author
	function top_comment_authors($amount = 5){
	    global $wpdb;
	    $results = $wpdb->get_results('
	        SELECT
	            COUNT(comment_author_email) AS comments_count, comment_author_email, comment_author, comment_author_url
	        FROM
	            '.$wpdb->comments.'
	        WHERE
	            comment_author_email != "" AND comment_type = "" AND comment_approved = 1
	        GROUP BY
	            comment_author_email
	        ORDER BY
	            comments_count DESC, comment_author ASC
	        LIMIT '.$amount
	    );
	    $output = "<ul>";
	    foreach($results as $result){
	        $output .= "<li>".$result->comment_author."</li>";
	    }
	    $output .= "</ul>";
	    echo $output;
	}
	// How To use:
	top_comment_authors();

// 57. Exclude Some Category from WP blog	
	$query = new WP_Query( 'cat=-3,-8' );

// 58. After Content – More From This Category
	function jeba_more_from_cat( $title = "More From This Category:" ) {
	    global $post;
	    // We should get the first category of the post
	    $categories = get_the_category( $post->ID );
	    $first_cat = $categories[0]->cat_ID;
	    // Let's start the $output by displaying the title and opening the <ul>
	    $output = '<div id="more-from-cat"><h3>' . $title . '</h3>';
	    // The arguments of the post list!
	    $args = array(
	        // It should be in the first category of our post:
	        'category__in' => array( $first_cat ),
	        // Our post should NOT be in the list:
	        'post__not_in' => array( $post->ID ),
	        // ...And it should fetch 5 posts - you can change this number if you like:
	        'posts_per_page' => 5
	    );
	    // The get_posts() function
	    $posts = get_posts( $args );
	    if( $posts ) {
	        $output .= '<ul>';
	        // Let's start the loop!
	        foreach( $posts as $post ) {
	            setup_postdata( $post );
	            $post_title = get_the_title();
	            $permalink = get_permalink();
	            $output .= '<li><a href="' . $permalink . '" title="' . esc_attr( $post_title ) . '">' . $post_title . '</a></li>';
	        }
	        $output .= '</ul>';
	    } else {
	        // If there are no posts, we should return something, too!
	        $output .= '<p>Sorry, this category has just one post and you just read it!</p>';
	    }
	    // Let's close the <div> and return the $output:
	    $output .= '</div>';
	    return $output;
	}

	// To use:
	echo jeba_more_from_cat( 'More From This Category:' );

// 59. To change the title attribute of WordPress login logo
	function  custom_login_title() {
        return 'Your desired text';
	}
	add_filter('login_headertitle', 'custom_login_title');

 // 60. To remove login shake effect when error occurs on wp login
	function wps_login_error() {
	        remove_action('login_head', 'wp_shake_js', 12);
	}
	add_action('login_head', 'wps_login_error');	