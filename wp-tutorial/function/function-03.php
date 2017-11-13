<?php

// 31. Create wordpress search form 
	<form method="get" action="<?php echo home_url(); ?>/">
	    <input name="s" type="text" placeholder="Type your keywords">                         
	    <input type="submit" value="Search">
	</form>

// 	32. If need to fixed post within a row in post query
	$i = 1;
	//added before to ensure it gets opened
	echo '<div>';
	if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();
	     // post stuff...
	 
	     // if multiple of 3 close div and open a new div
	     if($i % 3 == 0) {echo '</div><div>';}
	 
	$i++; endwhile; endif;
	//make sure open div is closed
	echo '</div>';

// 33. PHP if url extension action condition use
	 if( $_GET['action'] == 'discussion' ) { ?>
	    It's True.
	<?php } else { ?>
	    It's False.
	<?php } 

// 34. Center logo with both side navigation menu
	//header.php
	<nav id="primary-navigation" class="site-navigation" role="navigation">
	<?php wp_nav_menu( array( 'theme_location' => 'left', 'menu_class' => 'nav-menu' ) ); ?>
	<a itemprop="url" href="http://www.example.com/" title="My Company"><img src="http://www.example.com" alt="My cool company" /></a>
	<?php wp_nav_menu( array( 'theme_location' => 'right', 'menu_class' => 'nav-menu' ) ); ?>
	</nav>

	<nav id="primary-navigation" class="site-navigation" role="navigation">
	<?php wp_nav_menu( array( 'theme_location' => 'left', 'menu_class' => 'nav-menu' ) ); ?>
	<?php if ( get_theme_mod( 'mytheme_logo' ) ) : ?>
	<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'mytheme_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
	<?php else : ?>
	<hgroup>
	<h1 class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h1>
	<h2 class='site-description'><?php bloginfo( 'description' ); ?></h2>
	</hgroup>
	<?php endif; ?>
	<?php wp_nav_menu( array( 'theme_location' => 'right', 'menu_class' => 'nav-menu' ) ); ?>
	</nav>

	<?php
	//functions.php	
	function themeslug_theme_customizer( $wp_customize ) {
	 
	$wp_customize->add_setting( 'mytheme_logo' );
	 
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'mytheme_logo', array(
	'label'    => 'Logo',
	'section'  => 'mytheme_logo_section',
	'settings' => 'mytheme_logo',
	) ) );
	}
	add_action('customize_register', 'themeslug_theme_customizer');

// 35. Dynamic Popup social share with font awesome		 
	<a class="facebook-share" onClick="window.open('http://www.facebook.com/sharer.php?u=<?php echo site_url();?>','Facebook','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://www.facebook.com/sharer.php?u=<?php echo site_url();?>"><i class="fa fa-facebook"></i></a>                            
	 
	<a class="twitter-share" onClick="window.open('http://twitter.com/share?url=<?php echo site_url();?>&amp;text=<?php bloginfo('title'); ?>','Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://twitter.com/share?url=<?php echo site_url();?>&amp;text=<?php echo str_replace(" ", "%20", bloginfo('title')); ?>"><i class="fa fa-twitter"></i></a> 
	 
	<a class="google-plus-share" onClick="window.open('https://plus.google.com/share?url=<?php echo site_url();?>','Google plus','width=585,height=666,left='+(screen.availWidth/2-292)+',top='+(screen.availHeight/2-333)+''); return false;" href="https://plus.google.com/share?url=<?php echo site_url();?>"><i class="fa fa-google-plus"></i></a> 
	 
	<a class="pinterest-share" href='javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());'><i class="fa fa-pinterest"></i></a>

// 36. Gravity form popup with bootstrap modal
	function gf_popup_shortcode( $atts, $content = null  ) {
	 
	    extract( shortcode_atts( array(
	        'title' => '',
	        'id' => '',
	        'text' => '',
	    ), $atts ) );
	 
	    return '
	        <a class="gf-form-modal-trigger" href="" data-toggle="modal" data-target="#gf-popup-modal'.$id.'">'.$text.'</a>
	        <div class="modal fade" id="gf-popup-modal'.$id.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	            <div class="modal-dialog" role="document">
	                <div class="modal-content">
	                    <div class="modal-header">
	                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                        <h4 class="modal-title" id="myModalLabel">'.$title.'</h4>
	                    </div>
	                    <div class="modal-body">
	                        '.do_shortcode('[gravityform id="'.$id.'" title="false" description="false" ajax="true"]').'
	                    </div>
	                </div>
	            </div>
	        </div>
	    ';
	}   
	add_shortcode('gf_popup', 'gf_popup_shortcode');

// 37. Shortcode inside custom post with pagination problem
	function snowreports_shortcode($atts){
	    extract( shortcode_atts( array(
	        'count' => 10,
	    ), $atts) );
	    $i = 0;
	    $q = new WP_Query(
	        array(
	            'posts_per_page' => $count, 
	            'post_type' => 'posts', 
	            'paged'     => get_query_var('paged'),
	        )
	    );      
	          
	    $list = '<div class="custom-post-list">';
	    while($q->have_posts()) : $q->the_post();
	        $idd = get_the_ID();
	        $i++;
	        $custom_field = get_post_meta($idd, 'custom_field', true);
	        $post_content = get_the_excerpt();
	        $list .= '
	        <div class="single-post-item">
	            <h2><a href="'.get_permalink().'">' .do_shortcode( get_the_title() ). '</a></h2>
	            '.wpautop( $post_content ).'
	        </div>
	        ';        
	    endwhile;
	     
	    $total_pages = $q->max_num_pages;
	    $big = 999999999;
	    if ($total_pages > 1){  
	        $current_page = max(1, get_query_var('paged'));  
	        $list.= '<nav class="page-nav">';  
	        $list.= paginate_links(array(  
	            'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	            'format'    => '?paged=%#%',  
	            'current'   => $current_page,  
	            'total'     => $total_pages,  
	            'prev_text' => 'Prev',  
	            'next_text' => 'Next' 
	        ));  
	        $list.= '</nav>';  
	    }     
	     
	     
	    $list.= '</div>';
	    wp_reset_query();
	    return $list;
	}
	add_shortcode('snowreports', 'snowreports_shortcode');

// 38. Change “Product Description” text in single product woocommerce
	/** 
	 * Change on single product panel "Product Description"
	 * since it already says "features" on tab.
	 */
	function wpcheatsheet_product_description_heading() {
	    return __('YOUR CUSTOM TITLE', 'woocommerce');
	}
	 
	add_filter('woocommerce_product_description_heading',
	'wpcheatsheet_product_description_heading');

// 39. Woocommerce get price in custom loop
	global $woocommerce;
	$currency = get_woocommerce_currency_symbol();
	$price = get_post_meta( get_the_ID(), '_regular_price', true);
	$sale = get_post_meta( get_the_ID(), '_sale_price', true);
	?>
	 
	<?php if($sale) : ?>
	<p class="product-price-tickr"><del><?php echo $currency; echo $price; ?></del> <?php echo $currency; echo $sale; ?></p>    
	<?php elseif($price) : ?>
	<p class="product-price-tickr"><?php echo $currency; echo $price; ?></p>    
	<?php endif; ?>

				