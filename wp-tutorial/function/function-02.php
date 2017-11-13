<?php
//16 17 19 
// 11. Dynamic bootstrap carousel bullets
		global $post;
		$number = 0; 
		$args = array( 'posts_per_page' => -1, 'post_type'=> 'posttype', 'orderby' => 'menu_order', 'order' => 'ASC' );
		$myposts = get_posts( $args );
		foreach( $myposts as $post ) : setup_postdata($post); ?>
		 
		<li data-target="#myCarousel" data-slide-to="<?php echo $number++; ?>"></li>
		 
		<?php endforeach;

// 12. Get author post count inside & outside loop
		//inside loop
		$author_id= get_the_author_meta('ID');
		echo count_user_posts( $author_id );
		//outside loop		 
		echo count_user_posts( 1 );
// 13. Redirecting to Another URL After contact form 7 submissions
		//On contact form 7 editor’s Additional Settings field section, just add this code.
		on_sent_ok: "location = 'http://example.com/';"
// 14. logged conditional content WordPress
		if (is_user_logged_in() ): ?>
	    <a href="<?php echo wp_logout_url() ?>" title="Logout">Logout</a>
		<?php else: ?> 
		        <a href="http://example.com/wp-login.php" title="Logout">Member Login</a>
		<?php endif 
// 15. Dynamic page content – page.php	
	<?php if(have_posts()) : ?><?php while(have_posts())  : the_post(); ?> 
	 
	   <h2><?php the_title(); ?></h2>
	   <?php the_content(); ?>
	 
	<?php endwhile; endif; 
// 16. Redirect to custom page after plugin activation	[buji na]
		register_activation_hook(__FILE__, 'my_plugin_activate');
		add_action('admin_init', 'my_plugin_redirect');
		 
		function my_plugin_activate() {
		    add_option('my_plugin_do_activation_redirect', true);
		}
		 
		function my_plugin_redirect() {
		    if (get_option('my_plugin_do_activation_redirect', false)) {
		        delete_option('my_plugin_do_activation_redirect');
		        if(!isset($_GET['activate-multi']))
		        {
		            wp_redirect("PAGE_LINK");
		        }
		    }
		}
// 17. Get terms form specific taxonomy
		// Storing taxonomy's ID in a variable. 
$terms = get_terms( 'product_cat' );
 
// Retrieve list as name
echo '<ul>';
foreach ( $terms as $term )  { 
    echo '<li>' . $term->name . '</li>';
}
echo '</ul>';

// 18. Protect WordPress Config Files From Direct Access
//Add following snippet to your “.htaccess” file.
# "-Indexes" will have Apache block users from browsing folders without a default document
# Usually you should leave this activated, because you shouldn't allow everybody to surf through
# every folder on your server (which includes rather private places like CMS system folders).
<IfModule mod_autoindex.c>
  Options -Indexes
</IfModule>
 
 
# Block access to "hidden" directories or files whose names begin with a period. This
# includes directories used by version control systems such as Subversion or Git.
<IfModule mod_rewrite.c>
  RewriteCond %{SCRIPT_FILENAME} -d [OR]
  RewriteCond %{SCRIPT_FILENAME} -f
  RewriteRule "(^|/)\." - [F]
</IfModule>
 
 
# Block access to backup and source files
# This files may be left by some text/html editors and
# pose a great security danger, when someone can access them
<FilesMatch "(\.(bak|config|sql|fla|psd|ini|log|sh|inc|swp|dist)|~)$">
  Order allow,deny
  Deny from all
  Satisfy All
</FilesMatch>
 
 
# Block access to WordPress files that reveal version information.
<FilesMatch "^(wp-config\.php|readme\.html|license\.txt)">
  Order allow,deny
  Deny from all
  Satisfy All
</FilesMatch>

// 19. Different widget for different pages
<?php if ( is_page('testimonials') ) : ?>
       <?php if ( !dynamic_sidebar('testimonial_sidebar') ) : ?><?php endif ; ?>
 
        <?php elseif (is_page('contact')) : ?>
      <?php if ( !dynamic_sidebar('contact_sidebar') ) : ?> <?php endif ; ?>
         
         
         <?php elseif (is_page(147)) : ?>
          <?php if ( !dynamic_sidebar('matrix_nlp') ) : ?> <?php endif ; ?>
         
         
         <?php elseif (is_page(71)) : ?>
          <?php if ( !dynamic_sidebar('corporate_nlp_programs') ) : ?> <?php endif ; ?>
         
         
         <?php elseif (is_page(154)) : ?>
          <?php if ( !dynamic_sidebar('nlp_practitioner_certification') ) : ?> <?php endif ; ?>
         
         
          <?php elseif (is_page(165)) : ?>
          <?php if ( !dynamic_sidebar('nlp_master') ) : ?> <?php endif ; ?>
         
         
        <?php elseif (is_page(200)) : ?>
          <?php if ( !dynamic_sidebar('nlp_to_excellence') ) : ?> <?php endif ; ?>
         
        <?php else : ?>
           <?php if ( !dynamic_sidebar('unique_sidebar_id') ) : ?><?php endif ; ?>
        <?php endif; 

// 20.   Mobile Website Redirect Code
//Note: Works when added to the header.php file in most WordPress themes.
<?php
$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
 
if ($iphone || $android || $palmpre || $ipod || $berry == true) 
{
    echo "<script>window.location='http://m.site.com'</script>";
 }
?>



