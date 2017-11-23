<?php
// 121. Authors to See their Own Posts in WordPress Admin not ok
function posts_for_current_author($query) {
    global $pagenow;
 
    if( 'edit.php' != $pagenow || !$query->is_admin )
        return $query;
 
    if( !current_user_can( 'edit_others_posts' ) ) {
        global $user_ID;
        $query->set('author', $user_ID );
    }
    return $query;
}
add_filter('pre_get_posts', 'posts_for_current_author');

// 122. Preventing Users From Accessing wp-admin
function jeba_blockusers_init() {
    if ( is_admin() && ! current_user_can( 'administrator' ) && 
       ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
        wp_redirect( home_url() );
        exit;
    }
add_action( 'init', 'jeba_blockusers_init' );
}

// 123. WooCommerce AJAX Cart update after add to cart clicking
// Handle cart in header fragment for ajax add to cart
add_filter('add_to_cart_fragments', 'header_add_to_cart_fragment');
function header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
 
    ob_start();
 
    woocommerce_cart_link();
 
    $fragments['a.cart-button'] = ob_get_clean();
 
    return $fragments;
 
}
 
function woocommerce_cart_link() {
    global $woocommerce;
    ?>
    <a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> <?php _e('in your shopping cart', 'woothemes'); ?>" class="cart-button ">
    <span class="label"><?php _e('My Basket:', 'woothemes'); ?></span>
    <?php echo $woocommerce->cart->get_cart_total();  ?>
    <span class="items"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?></span>
    </a>
    <?php
}

// 124. If custom post type post not open in single
/* Flush rewrite rules for custom post types. */
add_action( 'after_switch_theme', 'jeba_flush_rewrite_rules' );
 
/* Flush your rewrite rules */
function jeba_flush_rewrite_rules() {
     flush_rewrite_rules();
}
// Note: After add this function in your theme functions.php file active another default theme and reactive your current theme.

// 125. Limit Login Attemps
/**
 * CLASS LIMIT LOGIN ATTEMPTS
 * Prevent Mass WordPress Login Attacks by setting locking the system when login fail.
 * To be added in functions.php or as an external file.
 */
if ( ! class_exists( 'Limit_Login_Attempts' ) ) {
    class Limit_Login_Attempts {
 
        var $failed_login_limit = 3;                    //Number of authentification accepted
        var $lockout_duration   = 1800;                 //Stop authentification process for 30 minutes: 60*30 = 1800
        var $transient_name     = 'attempted_login';    //Transient used
 
        public function __construct() {
            add_filter( 'authenticate', array( $this, 'check_attempted_login' ), 30, 3 );
            add_action( 'wp_login_failed', array( $this, 'login_failed' ), 10, 1 );
        }
 
        /**
         * Lock login attempts of failed login limit is reached
         */
        public function check_attempted_login( $user, $username, $password ) {
            if ( get_transient( $this->transient_name ) ) {
                $datas = get_transient( $this->transient_name );
 
                if ( $datas['tried'] >= $this->failed_login_limit ) {
                    $until = get_option( '_transient_timeout_' . $this->transient_name );
                    $time = $this->when( $until );
 
                    //Display error message to the user when limit is reached 
                    return new WP_Error( 'too_many_tried', sprintf( __( '<strong>ERROR</strong>: You have reached authentification limit, you will be able to try again in %1$s.' ) , $time ) );
                }
            }
 
            return $user;
        }
 
 
        /**
         * Add transient
         */
        public function login_failed( $username ) {
            if ( get_transient( $this->transient_name ) ) {
                $datas = get_transient( $this->transient_name );
                $datas['tried']++;
 
                if ( $datas['tried'] <= $this->failed_login_limit )
                    set_transient( $this->transient_name, $datas , $this->lockout_duration );
            } else {
                $datas = array(
                    'tried'     => 1
                );
                set_transient( $this->transient_name, $datas , $this->lockout_duration );
            }
        }
 
 
        /**
         * Return difference between 2 given dates
         * @param  int      $time   Date as Unix timestamp
         * @return string           Return string
         */
        private function when( $time ) {
            if ( ! $time )
                return;
 
            $right_now = time();
 
            $diff = abs( $right_now - $time );
 
            $second = 1;
            $minute = $second * 60;
            $hour = $minute * 60;
            $day = $hour * 24;
 
            if ( $diff < $minute )
                return floor( $diff / $second ) . ' secondes';
 
            if ( $diff < $minute * 2 )
                return "about 1 minute ago";
 
            if ( $diff < $hour )
                return floor( $diff / $minute ) . ' minutes';
 
            if ( $diff < $hour * 2 )
                return 'about 1 hour';
 
            return floor( $diff / $hour ) . ' hours';
        }
    }
}
 
//Enable it:
new Limit_Login_Attempts();

// 126. E-Mailing the Commenter After Their Comment Is Approved
add_action( 'comment_unapproved_to_approved', 'comment_unapproved_to_approved_example' );
  
function comment_unapproved_to_approved_example( $comment ) {
  
    $commenter_email = $comment->comment_author_email;
    $commenter_name  = $comment->comment_author;
    $post_url = get_comment_link( $comment );
    $subject = "Your comment is up!";
    $message = "Hello $commenter_name,\n\nYour comment has been approved!You can view it below:\n\n$post_url\n\nThank you for sharing your ideas with us!";
  
    wp_mail( $commenter_email, $subject, $message );
}

// 127. Remove p tags from shortcode wordpress
if( !function_exists('tm_fix_shortcodes') ) {
    function tm_fix_shortcodes($content){
         
        $array = array (
            '<p>[' => '[',
            ']</p>' => ']',
            ']<br />' => ']'
        );
         
        $content = strtr($content, $array);
         
        return $content;
         
    }
    add_filter('the_content', 'tm_fix_shortcodes');
}

// 128. Create custom wp registration form
class jeba_registration_form
{
 
    private $username;
    private $email;
    private $password;
    private $website;
    private $first_name;
    private $last_name;
    private $nickname;
    private $bio;
 
    function __construct()
    {
 
        add_shortcode('jeba_registration_form', array($this, 'shortcode'));
        add_action('wp_enqueue_scripts', array($this, 'flat_ui_kit'));
    }
 
 
    public function registration_form()
    {
 
        ?>
 
        <form method="post" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
            <div class="login-form">
                <div class="form-group">
                    <input name="reg_name" type="text" class="form-control login-field"
                           value="<?php echo(isset($_POST['reg_name']) ? $_POST['reg_name'] : null); ?>"
                           placeholder="Username" id="reg-name" required/>
                    <label class="login-field-icon fui-user" for="reg-name"></label>
                </div>
 
                <div class="form-group">
                    <input name="reg_email" type="email" class="form-control login-field"
                           value="<?php echo(isset($_POST['reg_email']) ? $_POST['reg_email'] : null); ?>"
                           placeholder="Email" id="reg-email" required/>
                    <label class="login-field-icon fui-mail" for="reg-email"></label>
                </div>
 
                <div class="form-group">
                    <input name="reg_password" type="password" class="form-control login-field"
                           value="<?php echo(isset($_POST['reg_password']) ? $_POST['reg_password'] : null); ?>"
                           placeholder="Password" id="reg-pass" required/>
                    <label class="login-field-icon fui-lock" for="reg-pass"></label>
                </div>
 
                <div class="form-group">
                    <input name="reg_website" type="text" class="form-control login-field"
                           value="<?php echo(isset($_POST['reg_website']) ? $_POST['reg_website'] : null); ?>"
                           placeholder="Website" id="reg-website"/>
                    <label class="login-field-icon fui-chat" for="reg-website"></label>
                </div>
 
                <div class="form-group">
                    <input name="reg_fname" type="text" class="form-control login-field"
                           value="<?php echo(isset($_POST['reg_fname']) ? $_POST['reg_fname'] : null); ?>"
                           placeholder="First Name" id="reg-fname"/>
                    <label class="login-field-icon fui-user" for="reg-fname"></label>
                </div>
 
                <div class="form-group">
                    <input name="reg_lname" type="text" class="form-control login-field"
                           value="<?php echo(isset($_POST['reg_lname']) ? $_POST['reg_lname'] : null); ?>"
                           placeholder="Last Name" id="reg-lname"/>
                    <label class="login-field-icon fui-user" for="reg-lname"></label>
                </div>
 
                <div class="form-group">
                    <input name="reg_nickname" type="text" class="form-control login-field"
                           value="<?php echo(isset($_POST['reg_nickname']) ? $_POST['reg_nickname'] : null); ?>"
                           placeholder="Nickname" id="reg-nickname"/>
                    <label class="login-field-icon fui-user" for="reg-nickname"></label>
                </div>
 
                <div class="form-group">
                    <input name="reg_bio" type="text" class="form-control login-field"
                           value="<?php echo(isset($_POST['reg_bio']) ? $_POST['reg_bio'] : null); ?>"
                           placeholder="About / Bio" id="reg-bio"/>
                    <label class="login-field-icon fui-new" for="reg-bio"></label>
                </div>
 
                <input class="btn btn-primary btn-lg btn-block" type="submit" name="reg_submit" value="Register"/>
        </form>
        </div>
    <?php
    }
 
    function validation()
    {
 
        if (empty($this->username) || empty($this->password) || empty($this->email)) {
            return new WP_Error('field', 'Required form field is missing');
        }
 
        if (strlen($this->username) < 4) {
            return new WP_Error('username_length', 'Username too short. At least 4 characters is required');
        }
 
        if (strlen($this->password) < 5) {
            return new WP_Error('password', 'Password length must be greater than 5');
        }
 
        if (!is_email($this->email)) {
            return new WP_Error('email_invalid', 'Email is not valid');
        }
 
        if (email_exists($this->email)) {
            return new WP_Error('email', 'Email Already in use');
        }
 
        if (!empty($website)) {
            if (!filter_var($this->website, FILTER_VALIDATE_URL)) {
                return new WP_Error('website', 'Website is not a valid URL');
            }
        }
 
        $details = array('Username' => $this->username,
            'First Name' => $this->first_name,
            'Last Name' => $this->last_name,
            'Nickname' => $this->nickname,
            'bio' => $this->bio
        );
 
        foreach ($details as $field => $detail) {
            if (!validate_username($detail)) {
                return new WP_Error('name_invalid', 'Sorry, the "' . $field . '" you entered is not valid');
            }
        }
 
    }
 
    function registration()
    {
 
        $userdata = array(
            'user_login' => esc_attr($this->username),
            'user_email' => esc_attr($this->email),
            'user_pass' => esc_attr($this->password),
            'user_url' => esc_attr($this->website),
            'first_name' => esc_attr($this->first_name),
            'last_name' => esc_attr($this->last_name),
            'nickname' => esc_attr($this->nickname),
            'description' => esc_attr($this->bio),
        );
 
        if (is_wp_error($this->validation())) {
            echo '<div style="margin-bottom: 6px" class="btn btn-block btn-lg btn-danger">';
            echo '<strong>' . $this->validation()->get_error_message() . '</strong>';
            echo '</div>';
        } else {
            $register_user = wp_insert_user($userdata);
            if (!is_wp_error($register_user)) {
 
                echo '<div style="margin-bottom: 6px" class="btn btn-block btn-lg btn-danger">';
                echo '<strong>Registration complete. Goto <a href="' . wp_login_url() . '">login page</a></strong>';
                echo '</div>';
            } else {
                echo '<div style="margin-bottom: 6px" class="btn btn-block btn-lg btn-danger">';
                echo '<strong>' . $register_user->get_error_message() . '</strong>';
                echo '</div>';
            }
        }
 
    }
 
    function flat_ui_kit()
    {
        wp_register_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css', array('jquery'), 3.3, true); 
 
        wp_enqueue_script('bootstrap'); 
     wp_enqueue_style('flat-ui-kit', plugins_url('css/flat-ui.css', __FILE__));
  
 
    }
 
    function shortcode()
    {
 
        ob_start();
 
        if ($_POST['reg_submit']) {
            $this->username = $_POST['reg_name'];
            $this->email = $_POST['reg_email'];
            $this->password = $_POST['reg_password'];
            $this->website = $_POST['reg_website'];
            $this->first_name = $_POST['reg_fname'];
            $this->last_name = $_POST['reg_lname'];
            $this->nickname = $_POST['reg_nickname'];
            $this->bio = $_POST['reg_bio'];
 
            $this->validation();
            $this->registration();
        }
 
        $this->registration_form();
        return ob_get_clean();
    }
 
}
 
new jeba_registration_form;
//Uses: Just add the [jeba_registration_form] shortcode. Note: Take the css in your theme css folder https://github.com/designmodo/Flat-UI/blob/master/dist/css/flat-ui.css

// 129. How to Show random post on WP except the last post
add_action('pre_get_posts','my_pre_get_posts');
function my_pre_get_posts($query) {
if ( $query->is_home() && $query->is_main_query() ) {
 $query->set('orderby', 'rand');
        $query->set('post__not_in',array(1));
}
}

// 130. Insert ads after second paragraph of single post content
add_filter( 'the_content', 'prefix_insert_post_ads' );
    function prefix_insert_post_ads( $content ) {
        $ad_code = '<div>Ads code here</div>';
        if ( is_single() && ! is_admin() ) {
            return prefix_insert_after_paragraph( $ad_code, 2, $content );
        }
        return $content;
    }
    // Parent Function that makes the magic happen
    function prefix_insert_after_paragraph( $insertion, $paragraph_id, $content ) {
        $closing_p = '</p>';
        $paragraphs = explode( $closing_p, $content );
        foreach ($paragraphs as $index => $paragraph) {
            if ( trim( $paragraph ) ) {
                $paragraphs[$index] .= $closing_p;
            }
            if ( $paragraph_id == $index + 1 ) {
                $paragraphs[$index] .= $insertion;
            }
        }
        return implode( '', $paragraphs );
    
}


