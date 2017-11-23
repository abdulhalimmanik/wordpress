<?php
// 111. Disabling Theme Changing for other admin done!
add_action( 'admin_init', 'slt_lock_theme' );
function slt_lock_theme() {
    global $submenu, $userdata;
    get_currentuserinfo();
    if ( $userdata->ID != 1 ) {
        unset( $submenu['themes.php'][5] );
        unset( $submenu['themes.php'][15] );
    }
}

// 112. List your most popular Posts
function listPopularPosts() {
    global $wpdb;
    $strBuidler = '';
      
    $result = $wpdb->get_results("SELECT comment_count, ID, post_title FROM $wpdb->posts ORDER BY comment_count DESC LIMIT 0 , 5");
      
    foreach ($result as $post) {
    setup_postdata($post);
    $postId = $post->ID;
    $title = $post->post_title;
    $commentCount = $post->comment_count;
          
    if ($commentCount != 0) {
        $strBuidler .= '<li>';
        $strBuidler .= '<a href="' . get_permalink($postId) . '" title="' . $title . '">' . $title . '</a> ';
        $strBuidler .= '(' . $commentCount . ')';
        $strBuidler .= '</li>';
    }
    }   
      
    return $strBuidler;
} 

// put it in theme template
<h2><?php _e('Popular Posts'); ?></h2>
<ul>
    <?php echo(listPopularPosts()); ?>
</ul>
<?php
// 113. Remove Paragraph Tags From Images in WordPress not ok
function filter_ptags_on_images($content){
    return preg_replace('/
\s*(<a>)?\s*(<img alt="" />)\s*(&lt;\/a&gt;)?\s*&lt;\/p&gt;/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');

// 114. Add Custom Post Types to Main Loop 
function add_to_main_loop($query) { 
    if ($query->is_main_query()) {
        $query->set('post_type', array('post','POST_TYPE'));
    }
}
  
add_action('pre_get_posts', 'add_to_main_loop');
 
// 115. Create A Loop Of Images
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=['"]([^'"]+)['"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];
 
  if(empty($first_img)){ //Defines a default image
    $first_img = "/images/default.jpg";
  }
  return $first_img;
}
// usuages
if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <a href="<?php the_permalink();?>" title="<?php the_title(); ?>" class="img-loop">
        <img src="http://media.mediatemple.netdna-cdn.com/wp-content/uploads/images/wordpress-loop-hacks/<?php echo catch_that_image() ?>" alt="<?php the_title(); ?>" />
        </a>
    endwhile;
endif;

// 116. Automatically email contributors when their posts are published
function jeba_authorNotification($post_id) {
   $post = get_post($post_id);
   $author = get_userdata($post->post_author);
 
   $message = "
      Hi ".$author->display_name.",
      Your post, ".$post->post_title." has just been published. Well done!
   ";
   wp_mail($author->user_email, "Your article is online", $message);
}
add_action('publish_post', 'jeba_authorNotification');

// 117. How To Create WordPress Percent Bar Shortcode////////// PERCENTAGE BAR not working
function percentbar ($atts, $content = null) {
    extract(shortcode_atts(array(
        'percentage' => ''
        ), $atts));
         
return '<div class="progressbar"><span class="percentage" style="width:' . ($percentage) . '%">'.do_shortcode($content).'</span></div>';
}
add_shortcode ("percentbar", "percentbar");

// 118. add odd and even class to wordpress posts
function oddeven_post_class ( $classes ) {
    global $current_class;
    $classes[] = $current_class;
    $current_class = ( $current_class == 'odd' ) ? 'even' : 'odd';
    return $classes;
}
add_filter ( 'post_class' , 'oddeven_post_class' );
global $current_class;
$current_class = 'odd';

// 119. auto link keywords in post content and excerpt
function wcs_auto_link_keywords( $text ) {
    $replace = array(
        'wordpress' => '<a href="http://www.wordpress.org">wordpress</a>',
        'google' => '<a href="http://www.google.com">excerpt</a>',
        'facebook' => '<a href="http://www.facebook.com">function</a>'
    );
    $text = str_replace( array_keys($replace), $replace, $text );
    return $text;
}
add_filter( 'the_content', 'wcs_auto_link_keywords' );
add_filter( 'the_excerpt', 'wcs_auto_link_keywords' );

// 120. How to load javascript on custom page template? not working
add_action('wp_enqueue_scripts','Load_Template_Scripts_wpa83855');
function Load_Template_Scripts_wpa83855(){
    if ( is_page_template('fullwidthpage.php') ) {
        wp_enqueue_script('my-script', '/wp-content/themes/understrap/js/shadowbox/shadowbox.js');
    } 
}