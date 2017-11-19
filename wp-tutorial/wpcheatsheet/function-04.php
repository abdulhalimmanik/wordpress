<?php 
// 41. Register widget in wordpress
	function my_custom_theme_widgets() {
	    register_sidebar( array(
	        'name' => 'My Widget',
	        'id' => 'widget_id',
	        'before_widget' => '<div class="widget_div">',
	        'after_widget' => '</div>',
	        'before_title' => '<h2>',
	        'after_title' => '</h2>',
	    ) );
	}
	add_action('widgets_init', 'my_custom_theme_widgets');
	//Single widget:
	dynamic_sidebar('widget_id'); 
	//Conditional
	 if ( ! dynamic_sidebar( 'sidebar-top' ) ) : 
	// Your conditional codes
	endif; 

// 42. Register custom post & custom taxonomy in wordpress
	add_action( 'init', 'my_theme_custom_post' );
	function my_theme_custom_post() {
	    register_post_type( 'cpt',
	        array(
	            'labels' => array(
		                'name' => __( 'CPTs' ),
		                'singular_name' => __( 'CPT' )
		            ),
	            'supports' => array('title', 'editor', 'custom-fields', 'thumbnail', 'page-attributes'),
	            'public' => true,
	            'description' => __( 'this is custom post type' )
	        )
	    );
	}
	function my_theme_custom_post_taxonomy() {
	    register_taxonomy(
	        'cpt_cat',  
	        'cpt',                  
	        array(
	            'hierarchical'          => true,
	            'label'                 => 'CPT Category',  
	            'query_var'             => true,
	            'show_admin_column'     => true,
	            'rewrite'               => array(
	                'slug'              => 'cpt-category', 
	                'with_front'    => true 
	                )
	            )
	    );
	}
	add_action( 'init', 'my_theme_custom_post_taxonomy');
// 43. Dynamic wordpress menu
	add_action('init', 'my_theme_register_menu');
	function my_theme_register_menu() {
	    register_nav_menu( 'main-menu', 'Main Menu');
	} 
	 
	// Default menu
	 function my_theme_default_menu() {
	    echo '<ul id="nav">';
	    if ('page' != get_option('show_on_front')) {
	        echo '<li><a href="'. home_url() . '/">Home</a></li>';
	    }
	    wp_list_pages('title_li=');
	        echo '</ul>';
	}
	// General:	
	wp_nav_menu(array('theme_location' => 'main-menu', 'menu_id' => 'nav'));
	// Dynamicaly
	if (function_exists('my_theme_default_menu')) {
	    wp_nav_menu(array('theme_location' => 'main-menu', 'menu_id' => 'nav', 'fallback_cb' => 'my_theme_default_menu'));
	}
	else {
	    my_theme_default_menu();
	}
// 44. How to add favicon in wordpress website?
	<link type="image/x-icon" rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico">
	//If you have favicon as png image format, you can use this code. Make sure your favicon size is 16x16px
	<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png"/>
	//You can register favicon via functions.php too. See this code
	function my_theme_add_favicon(){ ?>
    <!-- Custom Favicons -->
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri();?>/img/favicon.ico"/>
    <?php }
	add_action('wp_head','my_theme_add_favicon');

// 45. Show all tags sorting by the number of post
	$tags = get_terms( array("post_tag"), array("orderby"=>"count","order"=>"DESC"));
	if ( !empty( $tags ) && !is_wp_error( $tags ) ) :
	echo '<ul>';
	foreach ( $tags as $tag ) :
	echo '<li>' . $tag->name . '(' . $tag->count . ')</li>';
	endforeach;
	echo '</ul>';
	endif;
//46. Show author more post
	function get_related_author_posts() {
	global $authordata, $post;
	$authors_posts = get_posts( array( 'author' => $authordata->ID, 'post__not_in' => array( $post->ID ), 'posts_per_page' => 5 ) );
	$output = '<ul>';
	foreach ( $authors_posts as $authors_post ) {
	    $output .= '<li><a href="' . get_permalink( $authors_post->ID ) . '">' . apply_filters( 'the_title', $authors_post->post_title, $authors_post->ID ) . '</a></li>';
	}
	$output .= '</ul>';
	return $output;
	}
	// To use in position
	echo get_related_author_posts();

// 47. Redirect to custom page
	function login_redirect( $redirect_to, $request, $user ){
	  
	return home_url('custom-page-url-extension');
	//Custom page url extension where want redirect  
	  
	}
	  
	add_filter( 'login_redirect', 'login_redirect', 10, 3 );
	// Redirect after comment submit:
	add_filter('comment_post_redirect', 'thank_you_redirect');
	function thank_you_redirect($location)
	{
	return 'http://www.yoursite.com/thanks.html';
	}
// 48. Not display some category products on the shop page
	add_action( 'pre_get_posts', 'custom_pre_get_posts_query' );
	 
	function custom_pre_get_posts_query( $q ) {
	 
	if ( ! $q->is_main_query() ) return;
	if ( ! $q->is_post_type_archive() ) return;
	 
	if ( ! is_admin() && is_shop() && ! is_user_logged_in() ) {
	 
	$q->set( 'tax_query', array(array(
	'taxonomy' => 'product_cat',
	'field' => 'slug',
	'terms' => array( 'shirt', 'tshirt', 'pant' ), //Category name which not to want display products on the shop page
	'operator' => 'NOT IN'
	)));
	 
	}
	 
	remove_action( 'pre_get_posts', 'custom_pre_get_posts_query' );
	 
	}

// 49. 	Load jQuery and dependent JS libraries from function.php
	wp_enqueue_script('jquery');
	 
	if (!function_exists('load_theme_scripts')) {
	    function load_theme_scripts(){
	        wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0.0', true );
	    }
	    add_action("wp_enqueue_scripts", "load_theme_scripts");
	}

// 50. To Get Author information
	the_author(); ?>
	<?php echo get_avatar( get_the_author_email(), 'size here' ); ?>
	<?php echo the_author_link(); ?>
	<?php the_author_posts_link(); ?>
	<?php the_author_meta( $field, $userID ); ?> 
	<?php the_author_meta('twitter'); ?>
	<?php the_author_description(); ?>
	<?php echo date("D M Y", strtotime(get_userdata(get_current_user_id( ))->user_registered)); ?


	// To add more social fields for author:
	function my_new_contactmethods( $contactmethods ) {
	// Add Twitter
	$contactmethods['twitter'] = 'Twitter';
	//add Facebook
	$contactmethods['facebook'] = 'Facebook';
	//here can be add more
	return $contactmethods;
	}
	add_filter('user_contactmethods','my_new_contactmethods',10,1);
