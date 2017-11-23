<?php
// 131. First post image auto set as featured image
function auto_featured_image() {
global $post;
  
if (!has_post_thumbnail($post->ID)) {
$attached_image = get_children( "post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1" );
  
if ($attached_image) {
foreach ($attached_image as $attachment_id => $attachment) {
set_post_thumbnail($post->ID, $attachment_id);
}
}
}
}
// Use it temporary to generate all featured images
add_action('the_post', 'auto_featured_image');
// Used for new posts
add_action('save_post', 'auto_featured_image');
add_action('draft_to_publish', 'auto_featured_image');
add_action('new_to_publish', 'auto_featured_image');
add_action('pending_to_publish', 'auto_featured_image');
add_action('future_to_publish', 'auto_featured_image');

// 132. Ajax wordpress login modal // further study
// 133. Change “Product Description” text in single product woocommerce
/** 
 * Change on single product panel "Product Description"
 * since it already says "features" on tab.
 */
function wpcheatsheet_product_description_heading() {
    return __('YOUR CUSTOM TITLE', 'woocommerce');
}
 
add_filter('woocommerce_product_description_heading',
'wpcheatsheet_product_description_heading');

// 134. WordPress limit Comment Length
add_filter( 'preprocess_comment', 'jeba_wp_comment_length' );
 
function jeba_wp_comment_length($comment) {
if ( strlen( $comment['comment_content'] ) > 4000 ) {
wp_die('Comment is too long. Please keep your comment under 4000 characters.');
}
if ( strlen( $comment['comment_content'] ) < 90 ) {
wp_die('Comment is too short. Please use at least 90 characters.');
}
return $comment;
}

// 135. Create Custom WordPress User Roles
// To add the new role, using 'international' as the short name and
// 'International Blogger' as the displayed name in the User list and edit page:
 
add_role('international', 'International Blogger', array(
    'read' => true, // True allows that capability, False specifically removes it.
    'edit_posts' => true,
    'delete_posts' => true,
    'edit_published_posts' => true,
    'publish_posts' => true,
    'edit_files' => true,
    'import' => true,
    'upload_files' => true //last in array needs no comma!
));
 
  
// To remove one outright or remove one of the defaults:
/*
remove_role('international');
*/

// 136. Remove Query Strings from Static Resources
function _remove_script_version( $src ){
    $parts = explode( '?ver', $src );
    return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );