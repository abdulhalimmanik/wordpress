<?php
// 101. Automatically Replace Words With Affiliate Links ok
function auto_add_affiliate_links($text){
    $replace_words = array(
        //text to search => text to replace
        'amazon' => '<a href="http://amazon.com/ref_id">Amazon</a>',
        'ebay' => '<a href="http://ebay.com/ref_id">Ebay</a>',
        'buy at amazon' => '<a href="http://amazon.com/ref_id">buy at amazon</a>'
    );
    $text = str_replace(array_keys($replace_words), $replace_words, $text);
    return $text;
}
 
add_filter('the_content', 'auto_add_affiliate_links');
add_filter('the_excerpt', 'auto_add_affiliate_links');

// 102. Create Custom Widget done!
// Creating the widget 
class jeba_custom_widget extends WP_Widget {
 
function __construct() {
parent::__construct(
// Base ID of your widget
'jeba_custom_widget', 
 
// Widget name will appear in UI
__('Jeba Custom Widget', 'jeba_widget_domain'), 
 
// Widget description
array( 'description' => __( 'Sample widget based description here', 'jeba_widget_domain' ), ) 
);
}
 
// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
 
// This is where you run the code and display the output
echo __( 'Hello, World!', 'jeba_widget_domain' );
echo $args['after_widget'];
}
         
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'jeba_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
     
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class jeba_custom_widget ends here
 
// Register and load the widget
function jeba_load_widget() {
    register_widget( 'jeba_custom_widget' );
}
add_action( 'widgets_init', 'jeba_load_widget' ); 

// 103. Password Protected Pages Excerpt further study
function site_admin_excerpt( $excerpt ) {
    if ( post_password_required() )
    {
        $excerpt = 'This is a private page to request the password please contact the site administrator.';
    }
 
    return $excerpt;
}
add_filter( 'the_excerpt', 'site_admin_excerpt' );

// 104. Add class to first post in the wp loop done!
add_filter( 'post_class', 'jeba_first_post_class' );
function jeba_first_post_class( $classes ) {
    global $wp_query;
    if( 0 == $wp_query->current_post )
        $classes[] = 'first-post';
        return $classes;
}

// 105. Add extra field in wp comment form done!
add_filter( 'comment_form_defaults', 'add_extra_comment_form_field'); // Displaying field
add_filter( 'preprocess_comment', 'verify_comment_meta_data' ); // Verifying the data
add_action( 'comment_post', 'save_comment_meta_data' );
add_filter( 'get_comment_author_link', 'attach_location_to_author' ); // Retrieving and displaying the data
 
// Displaying field
function add_extra_comment_form_field( $default ) {
    $commenter = wp_get_current_commenter();
    $default[ 'fields' ][ 'email' ] .= '<p class="comment-form-author">' .
        '<label for="Location">'. __('Location') . '</label>
        <span class="required">*</span>
        <input id="location" name="location" size="30" type="text" /></p>';
    return $default;
}
// Verifying the data
function verify_comment_meta_data( $commentdata ) {
    if ( ! isset( $_POST['location'] ) )
        wp_die( __( 'Error: please fill the required field (location).' ) );
    return $commentdata;
}
//Saving in database
function save_comment_meta_data( $comment_id ) {
    add_comment_meta( $comment_id, 'location', $_POST[ 'location' ] );
}
//Retrieving and displaying the data
function attach_location_to_author( $author ) {
    $city = get_comment_meta( get_comment_ID(), 'location', true );
    if ( $location)
        $author .= " ($location)";
    return $author;
}

// 106. WP Sidebar Widget for Image, Product or a Banner done!
add_action('widgets_init', create_function('', 'return register_widget("WPDS_Image");'));
class WPDS_Image extends WP_Widget 
{
   var $defaults = array(
        'title' => 'Image Title',
        'description' => 'Add image/product description here.',
        'image' => '',
        'link' => '',
        'more_label' => 'View Details &raquo;',
        'image_position' => 'before_title',
        'image_align' => 'aligncenter',
    );
     
    function __construct() 
    {
        $widget_options = array('description' => __('Add an image, advertisement or product with its description and link.', 'wpds') );
        $this->WP_Widget('wpdev_image', '&raquo; WPDS Image', $widget_options, array( 'width' => 500));
    }
 
    function widget($args, $instance)
    {
        global $theme;
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        echo $before_widget;
 
        if($instance['image']) {
            $image_align = $instance['image_align'];
            if($instance['image_position'] == 'bottom') {
                $image_align .= ' inbottom';
            }
            if($instance['link']) {
                $output_image = '<a href="' . $instance['link'] .'"><img src="' . $instance['image'] .'" class="' . $image_align . '" /></a>';
            } else {
                $output_image = '<img src="' . $instance['image'] .'" class="' . $image_align . '" />';
            }
        } else {
            $output_image = false;
        }
          
         
         
    ?>
        <ul class="widget-container"><li class="wpds_image-widget">
            <?php
                if($output_image && $instance['image_position'] == 'before_title')
                    echo $output_image;
                 
        if ( $title )
         
                if ($title) {
                    echo $before_title;
                    echo ($instance['link'])? '<a href="<?php echo '.$instance['link'].'">'.$title .'</a>':$title;
                    echo $after_title;
                }
             ?>
            <ul>
               <li class="wpds_image-widget-description">
            <?php
                if($output_image && $instance['image_position'] == 'before_desc')
                    echo $output_image;
 
                if($instance['description'])
                    echo $instance['description'];
 
                if($instance['link'] && $instance['more_label'])
                    echo ' <a href="' . $instance['link'] .'" class="wpds_image-widget-more">' . $instance['more_label'] .'<a/>';
 
                if($output_image && $instance['image_position'] == 'bottom')
                    echo $output_image;
            ?>
               </li>
            </ul>
        </li></ul>
        <?php
        echo $after_widget;
    }
 
    function update($new_instance, $old_instance) 
    {
 
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['description'] = $new_instance['description'];
        $instance['link'] = strip_tags($new_instance['link']);
        $instance['more_label'] = $new_instance['more_label'];
        $instance['image'] = strip_tags($new_instance['image']);
        $instance['image_position'] = strip_tags($new_instance['image_position']);
        $instance['image_align'] = strip_tags($new_instance['image_align']);
        return $instance;
    }
     
    function form($instance) 
    {   
    $instance = wp_parse_args( (array) $instance, $this->defaults );
         
        ?>
         
        <div class="wpds-widget">
            <table width="100%">
                <tr>
                    <td class="wpds-widget-label" width="25%"><label for="<?php echo $this->get_field_id('title'); ?>">Title:</label></td>
                    <td class="wpds-widget-content" width="75%"><input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" /></td>
                </tr>
                 
                <tr>
                    <td class="wpds-widget-label" width="25%"><label for="<?php echo $this->get_field_id('image'); ?>">Image URL:</label></td>
                    <td class="wpds-widget-content" width="75%"><input class="widefat" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>" type="text" value="<?php echo esc_attr($instance['image']); ?>" /></td>
                </tr>
                <tr>
                    <td class="wpds-widget-label" width="25%"><label for="<?php echo $this->get_field_id('link'); ?>">Link URL:</label></td>
                    <td class="wpds-widget-content" width="75%"><input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo esc_attr($instance['link']); ?>" /></td>
                </tr>
                <tr>
                    <td class="wpds-widget-label" valign="top"><label for="<?php echo $this->get_field_id('description'); ?>">Image Description:</label></td>
                    <td class="wpds-widget-content"><textarea class="widefat" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>" style="height: 160px;"><?php echo esc_attr($instance['description']); ?></textarea></td>
                </tr>
                <tr>
                    <td class="wpds-widget-label" width="25%"><label for="<?php echo $this->get_field_id('more_label'); ?>">"Read More" Label:</label></td>
                    <td class="wpds-widget-content" width="75%"><input class="widefat" id="<?php echo $this->get_field_id('more_label'); ?>" name="<?php echo $this->get_field_name('more_label'); ?>" type="text" value="<?php echo esc_attr($instance['more_label']); ?>" /></td>
                </tr>
                 
                <tr>
                    <td class="wpds-widget-label">Image Placement:</td>
                    <td class="wpds-widget-content">
                        <select name="<?php echo $this->get_field_name('image_position'); ?>">
                            <option value="before_title" <?php selected('before_title', $instance['image_position']); ?> >Before Title</option>
                            <option value="before_desc"  <?php selected('before_desc', $instance['image_position']); ?>>Before Description</option>
                            <option value="bottom" <?php selected('bottom', $instance['image_position']); ?>>Bottom</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="wpds-widget-label">Image Alignment:</td>
                    <td class="wpds-widget-content">
                        <select name="<?php echo $this->get_field_name('image_align'); ?>">
                            <option value="alignleft" <?php selected('alignleft', $instance['image_align']); ?> >Left</option>
                            <option value="alignright"  <?php selected('alignright', $instance['image_align']); ?>>Right</option>
                            <option value="aligncenter" <?php selected('aligncenter', $instance['image_align']); ?>>Center</option>
                        </select>
                    </td>
                </tr>
            </table>
          </div>
        <?php 
    }
} 

// 107. Show or Hide widgets on wp specific pages
add_filter( 'widget_display_callback', 'jeba_hide_widget_pages', 10, 3 );
function jeba_hide_widget_pages( $instance, $widget, $args ) {
  if ( $widget->id_base == 'pages' ) { // change 'pages' to widget name
     if ( !is_page( 'contact' ) ) {    // change page name
         return false;
     }
  }
}

// 108. Add Custom Dashboard Widgets in WordPress further
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;
 
wp_add_dashboard_widget('custom_help_widget', 'Theme Support', 'custom_dashboard_help');
}
 
function custom_dashboard_help() {
echo '<p>Here write custom widget data which show on widget if use the custom widget.</p>';
}
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

// 109. How to randomize the order of widgets in wp done!
add_filter ('sidebars_widgets', 'wcs_randomize_widget_order');
  
function wcs_randomize_widget_order($sidebars_widgets) {
    if (!is_admin()) {
        foreach ($sidebars_widgets as &$widget) {
            shuffle ($widget);
        }
    }
    return $sidebars_widgets;
}

// 110. Mark Comments with Very Long URLs as Spam
function rkv_url_spamcheck( $approved , $commentdata ) {
    return ( strlen( $commentdata['comment_author_url'] ) > 50 ) ? 'spam' : $approved;
  }
 
  add_filter( 'pre_comment_approved', 'rkv_url_spamcheck', 99, 2 );