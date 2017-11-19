<?php
// 91. Disable widget areas on specific pages done!
function disable_sidebar_widgets( $sidebars_widgets ) {
        if ( is_page('about-me') )
                $sidebars_widgets = array( false );
                return $sidebars_widgets;
}
// 92. Automatically Link Twitter Usernames In Content not working
function content_twitter_mention($content) {
    return preg_replace('/([^a-zA-Z0-9-_&])@([0-9a-zA-Z_]+)/', "$1<a href=\"http://twitter.com/$2\" target=\"_blank\" rel=\"nofollow\">@$2</a>", $content);
}
 
add_filter('the_content', 'content_twitter_mention');
add_filter('comment_text', 'content_twitter_mention');

// 93. Set Minimal Comment Limit not working
add_filter( 'preprocess_comment', 'minimal_comment_length' );
 
function minimal_comment_length( $commentdata ) {
    $minimalCommentLength = 20;
 
    if ( strlen( trim( $commentdata['comment_content'] ) ) < $minimalCommentLength ) 
        {
        wp_die( 'All comments must be at least ' . $minimalCommentLength . ' characters long.' );
        }
    return $commentdata;
}

// 94. Restrict Admin Area To Only Admin Users
function restrict_admin()
{
    if ( ! current_user_can( 'manage_options' ) ) {
                wp_redirect( site_url() );
                exit;
    }
}
add_action( 'admin_init', 'restrict_admin', 1 );

// 95. Restrict Admin Area To Only Admin Users
function twtreplace($content) {
$twtreplace = preg_replace('/([^a-zA-Z0-9-_&amp;])@([0-9a-zA-Z_]+)/',"$1<a href='//twitter.com/$2\&quot;' target='\&quot;_blank\&quot;' rel='\&quot;nofollow\&quot;'>@$2</a>",$content);
return $twtreplace;
}
add_filter('the_content', 'twtreplace');
add_filter('comment_text', 'twtreplace');

// 96. Disable Changing The WordPress Theme 
/**
* Disable changing the theme for anyone a part from the admin user
* Only can be changes
*/
add_action('admin_init', 'disable_changing_theme_for_non_admin');
 
function disable_changing_theme_for_non_admin() {
    global $submenu, $userdata;
    get_currentuserinfo();
    if ($userdata->ID != 1) {
        unset($submenu['themes.php'][5]);
    }
}

// 97. Automatically Set Featured Image not working
function autoset_featured() {
          global $post;
          $already_has_thumb = has_post_thumbnail($post->ID);
              if (!$already_has_thumb)  {
              $attached_image = get_children( "post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1" );
                          if ($attached_image) {
                                foreach ($attached_image as $attachment_id => $attachment) {
                                set_post_thumbnail($post->ID, $attachment_id);
                                }
                           }
                        }
      }
add_action('the_post', 'autoset_featured');
add_action('save_post', 'autoset_featured');
add_action('draft_to_publish', 'autoset_featured');
add_action('new_to_publish', 'autoset_featured');
add_action('pending_to_publish', 'autoset_featured');
add_action('future_to_publish', 'autoset_featured');

// 98. Automatically add a search form in your menu done!
add_filter('wp_nav_menu_items', 'add_search_form', 10, 2);
 
 function add_search_form($items, $args) {
          if( $args->theme_location == 'primary' )
          $items .= '<li class="search"><form role="search" method="get" id="searchform" action="'.home_url( '/' ).'"><input type="text" value="search" name="s" id="s" /><input type="submit" id="searchsubmit" value="'. __('Search') .'" /></form></li>';
     return $items;
}

// 99. Add Current Post Image Thumbnail To RSS Feed
function rss_post_thumbnail($content) {
global $post;
if(has_post_thumbnail($post->ID)) {
$content = '<p>' . get_the_post_thumbnail($post->ID) .
'</p>' . get_the_content();
}
return $content;
}
add_filter('the_excerpt_rss', 'rss_post_thumbnail');
add_filter('the_content_feed', 'rss_post_thumbnail');

// 100. Programmatically Add login and logout Item in Menu
add_filter( 'wp_nav_menu_items', 'add_logout_link', 10, 2);
 
/**
 * Add a login link to the members navigation
 */
function add_logout_link( $items, $args )
{
    if($args->theme_location == 'main-menu')
    {
        if(is_user_logged_in())
        {
            $items .= '<li><a href="'. wp_logout_url() .'">Log Out</a></li>';
        } else {
            $items .= '<li><a href="'. wp_login_url() .'">Log In</a></li>';
        }
    }
 
    return $items;
}