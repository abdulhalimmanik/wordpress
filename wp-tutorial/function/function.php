<?php
// further read
// 51 52 53 56


// problem


	//add action
	// functions.php
	function custom_hook() {
		do_action('custom_hook');
	}
	function hello_wordpress() {
		echo '<h1>Hello WordPress!</h1>';
	}
	add_action('custom_hook', 'hello_wordpress', 7);

	//theme template
	custom_hook();

	//add filter
	//function .php
	function replace_copyright( $copyright ) {
	    // do something to $copyright
	    return $copyright;
	}
	add_filter( 'my_footer_filter', 'replace_copyright' );

	//theme template
	echo apply_filters( 'my_footer_filter', 'Copyright 2011 By Me' );
    
// 41. Register widget in wordpress
// 42. Register custom post & custom taxonomy in wordpress
// 43. Dynamic wordpress menu
// 44. How to add favicon in wordpress website?
// 45. Show all tags sorting by the number of post
// 46. Show author more post
// 47. Redirect to custom page	
// 48. Not display some category products on the shop page
// 49. 	Load jQuery and dependent JS libraries from function.php
// 50. To Get Author information

// 51. To use setting option
// 52. How to register shortcode in wordpress
// 53. WP Plugin QuickStart Pack 
// 54. To Change Howdy text From WP Admin Bar
// 55. To Email User login support besides username
// 56. Get top commenter author
// 57. Exclude Some Category from WP blog
// 58. After Content – More From This Category
// 59. To change the title attribute of WordPress login logo
 // 60. To remove login shake effect when error occurs on wp login