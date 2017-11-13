<?php
08
// 01. Register option tree metabox

		//There are a few simple steps you need to take in order to use OptionTree's built in Meta Box API. In the code below I'll show you a basic demo of how to create your very own custom meta box using any number of the option types you have at your disposal. If you would like to see some demo code, there is a directory named theme-mode inside the assets directory that contains a file named demo-meta-boxes.php you can reference.

		//Create a file and name it anything you want, maybe meta-boxes.php.
		//As well, you'll probably want to create a directory named includes to put your meta-boxes.php into which will help keep you file structure nice and tidy.
		/** * Initialize the meta boxes. */
		add_action( 'admin_init', 'custom_meta_boxes' );

		function custom_meta_boxes() {

		  $my_meta_box = array(
		    'id'        => 'my_meta_box',
		    'title'     => 'My Meta Box',
		    'desc'      => '',
		    'pages'     => array( 'post' ),
		    'context'   => 'normal',
		    'priority'  => 'high',
		    'fields'    => array(
		      array(
		        'id'          => 'background',
		        'label'       => 'Background',
		        'desc'        => '',
		        'std'         => '',
		        'type'        => 'background',
		        'class'       => '',
		        'choices'     => array()
		      )
		    )
		  );
		  
		  ot_register_meta_box( $my_meta_box );

		}

		//Add the following code to your functions.php.

		/** * Meta Boxes */
		require( trailingslashit( get_template_directory() ) . 'includes/meta-boxes.php' );

// 02. How to activate option tree in wordpress theme	
		//Download the latest version of OptionTree and unarchive the .zip directory.
		//Put the option-tree directory in the root of your theme. For example, the server path would be /wp-content/themes/theme-name/option-tree/.
		//Add the following code to the beginning of your functions.php.	
		add_filter( 'ot_theme_mode', '__return_true' );
		require( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );
		//For a list of all the OptionTree UI display filters refer to the demo-functions.php file found in the /assets/theme-mode/ directory of this plugin. This file is the starting point for developing themes with Theme Mode.


// 03. Option tree demo theme option

		//Create Theme Options without using the UI Builder.
		//Create a file and name it anything you want, maybe theme-options.php, or use the built in file export to create it for you. Remember, you should always check the file for errors before including it in your theme.
		//As well, you'll probably want to create a directory named includes to put your theme-options.php into which will help keep you file structure nice and tidy.
		//Add the following code to your functions.php.			
		require( trailingslashit( get_template_directory() ) . 'includes/theme-options.php' );
		 
		//Add a variation of the following code to your theme-options.php. You'll obviously need to fill it in with all your custom array values for contextual help (optional), sections (required), and settings (required). 
		/**
		 * Initialize the options before anything else. 
		 */
		add_action( 'init', 'custom_theme_options', 1 );

		/**
		 * Build the custom settings & update OptionTree.
		 */
		function custom_theme_options() {

		  /* OptionTree is not loaded yet, or this is not an admin request */
		  if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
		    return false;

		  /**
		   * Get a copy of the saved settings array. 
		   */
		  $saved_settings = get_option( 'option_tree_settings', array() );
		  
		  /**
		   * Custom settings array that will eventually be 
		   * passes to the OptionTree Settings API Class.
		   */
		  $custom_settings = array(
		    'contextual_help' => array(
		      'content'       => array( 
		        array(
		          'id'        => 'general_help',
		          'title'     => 'General',
		          'content'   => '<p>Help content goes here!</p>'
		        )
		      ),
		      'sidebar'       => '<p>Sidebar content goes here!</p>',
		    ),
		    'sections'        => array(
		      array(
		        'id'          => 'general',
		        'title'       => 'General'
		      )
		    ),
		    'settings'        => array(
		      array(
		        'id'          => 'my_checkbox',
		        'label'       => 'Checkbox',
		        'desc'        => '',
		        'std'         => '',
		        'type'        => 'checkbox',
		        'section'     => 'general',
		        'class'       => '',
		        'choices'     => array(
		          array( 
		            'value' => 'yes',
		            'label' => 'Yes' 
		          )
		        )
		      ),
		      array(
		        'id'          => 'my_layout',
		        'label'       => 'Layout',
		        'desc'        => 'Choose a layout for your theme',
		        'std'         => 'right-sidebar',
		        'type'        => 'radio-image',
		        'section'     => 'general',
		        'class'       => '',
		        'choices'     => array(
		          array(
		            'value'   => 'left-sidebar',
		            'label'   => 'Left Sidebar',
		            'src'     => OT_URL . '/assets/images/layout/left-sidebar.png'
		          ),
		          array(
		            'value'   => 'right-sidebar',
		            'label'   => 'Right Sidebar',
		            'src'     => OT_URL . '/assets/images/layout/right-sidebar.png'
		          ),
		          array(
		            'value'   => 'full-width',
		            'label'   => 'Full Width (no sidebar)',
		            'src'     => OT_URL . '/assets/images/layout/full-width.png'
		          ),
		          array(
		            'value'   => 'dual-sidebar',
		            'label'   => __( 'Dual Sidebar', 'option-tree' ),
		            'src'     => OT_URL . '/assets/images/layout/dual-sidebar.png'
		          ),
		          array(
		            'value'   => 'left-dual-sidebar',
		            'label'   => __( 'Left Dual Sidebar', 'option-tree' ),
		            'src'     => OT_URL . '/assets/images/layout/left-dual-sidebar.png'
		          ),
		          array(
		            'value'   => 'right-dual-sidebar',
		            'label'   => __( 'Right Dual Sidebar', 'option-tree' ),
		            'src'     => OT_URL . '/assets/images/layout/right-dual-sidebar.png'
		          )
		        )
		      ),
		      array(
		        'id'          => 'my_slider',
		        'label'       => 'Images',
		        'desc'        => '',
		        'std'         => '',
		        'type'        => 'list-item',
		        'section'     => 'general',
		        'class'       => '',
		        'choices'     => array(),
		        'settings'    => array(
		          array(
		            'id'      => 'slider_image',
		            'label'   => 'Image',
		            'desc'    => '',
		            'std'     => '',
		            'type'    => 'upload',
		            'class'   => '',
		            'choices' => array()
		          ),
		          array(
		            'id'      => 'slider_link',
		            'label'   => 'Link to Post',
		            'desc'    => 'Enter the posts url.',
		            'std'     => '',
		            'type'    => 'text',
		            'class'   => '',
		            'choices' => array()
		          ),
		          array(
		            'id'      => 'slider_description',
		            'label'   => 'Description',
		            'desc'    => 'This text is used to add fancy captions in the slider.',
		            'std'     => '',
		            'type'    => 'textarea',
		            'class'   => '',
		            'choices' => array()
		          )
		        )
		      )
		    )
		  );
		  
		  /* settings are not the same update the DB */
		  if ( $saved_settings !== $custom_settings ) {
		    update_option( 'option_tree_settings', $custom_settings ); 
		  }
		  
		  /* Lets OptionTree know the UI Builder is being overridden */
		  global $ot_has_custom_theme_options;
		  $ot_has_custom_theme_options = true;
		  
		}

// 04.Option tree list item usages
		//To create option tree list item metabox
		array(
			'label'       => 'Team Social',
			'id'          => 'team_links',
			'type'        => 'list-item',
			'section'     => 'social_icons_setting',
			'settings'    => array(
			    array(
			        'id'        => 'social_icon_name',
			        'label'     => 'Social Icon Name',
			        'type'      => 'text'
			    ),
			    array(
			        'id'        => 'social_link_url',
			        'label'     => 'Social Network link',
			        'type'      => 'text'
			    )
			)          
		)		

		//Usages
		$team_links= get_post_meta($post->ID, 'team_links', true); 
		foreach( $team_links as $team_link ) {
		    echo '<a tearget="_blank" href="'.$team_link['social_link_url'].'"><i class="fa fa-'.$team_link['social_icon_name'].'"></i></a>';
		} 

// 05. WordPress image crop
		//But, if you need custom size, you can define sizes in functions.php					
		add_image_size( 'post-image', 600, 200, true );
		//Image URL
		//If you want to use wordpress resize just add your size, I’ve added large size image in example
		$image_variable = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); 
		echo $image_variable[0];
		//If you want to use your custom size
		$image_variable = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-image' ); 
		echo $image_variable[0];
// 06.Custom post loop with custom fields
		?>
		<?php
		global $post;
		$args = array( 'posts_per_page' => -1, 'post_type'=> 'posttype', 'orderby' => 'menu_order', 'order' => 'ASC' );
		$myposts = get_posts( $args );
		foreach( $myposts as $post ) : setup_postdata($post); ?>
		 
		<?php 
		   $job_link= get_post_meta($post->ID, 'job_instructions', true); 
		?>
		 
		    <h2><?php the_title(); ?></h2>
		    <?php the_content(); ?>
		    <p><?php echo $job_link; ?></p>
		<?php endforeach; wp_reset_query(); ?> // buji na
		<?php
		
		//Posts with Previous Next Navigation
		$postlist = get_posts( 'orderby=menu_order&sort_order=asc' );
		$posts = array();
		foreach ( $postlist as $post ) {
		   $posts[] += $post->ID;
		}

		$current = array_search( get_the_ID(), $posts );
		$prevID = $posts[$current-1];
		$nextID = $posts[$current+1];
		?>

		<div class="navigation">
		<?php if ( !empty( $prevID ) ): ?>
		<div class="alignleft">
		<a href="<?php echo get_permalink( $prevID ); ?>"
		  title="<?php echo get_the_title( $prevID ); ?>">Previous</a>
		</div>
		<?php endif;
		if ( !empty( $nextID ) ): ?>
		<div class="alignright">
		<a href="<?php echo get_permalink( $nextID ); ?>" 
		 title="<?php echo get_the_title( $nextID ); ?>">Next</a>
		</div>
		<?php endif; ?>
		</div><!-- .navigation -->
		<?php

// 07. Enable masonry in WordPress
		add_action( 'wp_enqueue_scripts', 'jk_masonry' );
		function jk_masonry() {
		  wp_enqueue_script( 'jquery-masonry', array( 'jquery' ) );
		}
		//How to use?
		//Get masonry resources form here: http://masonry.desandro.com/
		$('#container').masonry({ singleMode: true });
		$('#container').masonry({ columnWidth: 200 });
// 08. Shortcode inside custom post wordpress

		function post_list_shortcode($atts){
		    extract( shortcode_atts( array(
		        'count' => '',
		    ), $atts) );
		     
		    $q = new WP_Query(
		        array('posts_per_page' => $count, 'post_type' => 'posttype', 'orderby' => 'menu_order','order' => 'ASC')
		        );      
		         
		    $list = '<div class="custom_post_list">';
		    while($q->have_posts()) : $q->the_post();
		        $idd = get_the_ID();
		        $custom_field = get_post_meta($idd, 'custom_field', true);
		        $post_content = get_the_content();
		        $list .= '
		        <div class="single_post_item">
		            <h2>' .do_shortcode( get_the_title() ). '</h2> 
		            '.wpautop( $post_content ).'
		            <p>'.$custom_field.'</p>
		        </div>
		        ';   // buji na     
		    endwhile;
		    $list.= '</div>';
		    wp_reset_query();
		    return $list;
		}
		add_shortcode('post_list', 'post_list_shortcode');

// 09. Homepage/Front page only conditional code wordpress
		//Homepage only data with default page data
		?>
		<?php if( is_home() || is_front_page() ) : ?>
		 
		<!-- Homepage Only Code -->
		 
		<?php else : ?>
		 
		<!-- Other Page Code -->
		 
		<?php endif; ?>
		//Homepage only data

		<?php if( is_home() || is_front_page() ) : ?>
		 
		<!-- Homepage Only Code -->
		 
		<?php endif; ?>
// 10. 	Custom post query with pagination
		<?php 
		  $temp = $wp_query; 
		  $wp_query = null; 
		  $wp_query = new WP_Query(); 
		  $wp_query->query('showposts=6&post_type=posttype&orderby=menu_order&order=ASC'.'&paged='.$paged); 
		 
		  while ($wp_query->have_posts()) : $wp_query->the_post(); 
		?>
		 
		<?php
		   $custom_field= get_post_meta($post->ID, 'custom_field', true);
		?>
		  
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>
		<p><?php echo $custom_field; ?></p>                           
		 
		 
		<?php endwhile; ?>
		 
		<?php if (function_exists('wp_pagenavi')) { wp_pagenavi(); } else { include('navigation.php'); } ?>
		 
		<?php 
		  $wp_query = null; 
		  $wp_query = $temp;  // Reset
		?>	
		//Navigation.php code is
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyeleven' ) ); ?></div>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?></div>
