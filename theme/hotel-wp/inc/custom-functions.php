<?php
/**
 * Custom Functions
 *
 */

/**
 * Check a plugin active
 *
 * @param $plugin_dir
 * @param $plugin_file
 *
 * @return bool
 */
function thim_plugin_active($plugin_dir, $plugin_file = null)
{
    $plugin_file = $plugin_file ? $plugin_file : ($plugin_dir . '.php');
    $plugin = $plugin_dir . '/' . $plugin_file;
    $active_plugins_network = get_site_option('active_sitewide_plugins');

    if (isset($active_plugins_network[$plugin])) {
        return true;
    }

    $active_plugins = get_option('active_plugins');

    if (in_array($plugin, $active_plugins)) {
        return true;
    }

    return false;
}

/**
 * Get header layouts
 *
 * @return string CLASS for header layouts
 */
function thim_header_layout_class()
{
    $thim_options = get_theme_mods();

    if (isset($thim_options['header_style']) && get_theme_mod('header_style')) {
        echo ' ' . get_theme_mod('header_style');
    } else {
        echo ' header_v1';
    }

    if (isset($thim_options['header_position']) && get_theme_mod('header_position') == 'default') {
        echo ' header-default';
    } else {
        echo ' header-overlay';
    }

    if (get_theme_mod('show_sticky_menu', false)) :
        echo ' sticky-header';
    endif;

    if (get_theme_mod('show_magic_line', false)) :
        echo ' header-magic-line';
    endif;

    if (isset($thim_options['sticky_menu_style']) && get_theme_mod('sticky_menu_style') == 'custom') {
        echo ' custom-sticky';
    } else {
        echo '';
    }

    if (isset($thim_options['header_retina_logo']) && get_theme_mod('header_retina_logo')) {
        echo ' has-retina-logo';
    }

}

/**
 * Get Header Logo
 *
 * @return void
 */
if (!function_exists('thim_header_logo')) {
    function thim_header_logo()
    {
        $thim_logo_src = THIM_URI . "assets/images/logo.png";
        $thim_mobile_logo_src = THIM_URI . "assets/images/logo.png";
        if (get_theme_mod('header_style') == 'header_v4') {
            $thim_logo_src = THIM_URI . "assets/images/logo2.png";
            $thim_mobile_logo_src = THIM_URI . "assets/images/logo2-sticky.png";
        }
        $thim_retina_logo_src = '';

        if (get_theme_mod('header_logo', false)) {
            $thim_logo_src = get_theme_mod('header_logo');
            if (is_numeric($thim_logo_src)) {
                $logo_attachment = wp_get_attachment_image_src($thim_logo_src, 'full');
                $thim_logo_src = $logo_attachment[0];
            }
        }

        if (get_theme_mod('mobile_logo', false)) {
            $thim_mobile_logo_src = get_theme_mod('mobile_logo');
            if (is_numeric($thim_mobile_logo_src)) {
                $logo_attachment = wp_get_attachment_image_src($thim_mobile_logo_src, 'full');
                $thim_mobile_logo_src = $logo_attachment[0];
            }
        }

        echo '<a class="no-sticky-logo" href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name', 'display')) . ' - ' . esc_attr(get_bloginfo('description')) . '" rel="home">';
        echo '<img class="logo" src="' . esc_url($thim_logo_src) . '" alt="' . esc_attr(get_bloginfo('name', 'display')) . '" />';

        if (get_theme_mod('header_retina_logo', false)) {
            $thim_retina_logo_src = get_theme_mod('header_retina_logo');
            if (is_numeric($thim_retina_logo_src)) {
                $logo_attachment = wp_get_attachment_image_src($thim_retina_logo_src, 'full');
                $thim_retina_logo_src = $logo_attachment[0];
            }
            echo '<img class="retina-logo" src="' . esc_url($thim_retina_logo_src) . '" alt="' . esc_attr(get_bloginfo('name', 'display')) . '" />';
        }

        echo '<img class="mobile-logo" src="' . esc_url($thim_mobile_logo_src) . '" alt="' . esc_attr(get_bloginfo('name', 'display')) . '" />';
        echo '</a>';
    }
}
add_action('thim_header_logo', 'thim_header_logo');

/**
 * Get Header Sticky logo
 *
 * @return string
 */
if (!function_exists('thim_header_sticky_logo')) {
    function thim_header_sticky_logo()
    {
        $thim_logo_stick_logo_src = THIM_URI . 'assets/images/logo.png';
        if (get_theme_mod('header_style') == 'header_v4') {
            $thim_logo_stick_logo_src = THIM_URI . 'assets/images/logo2-sticky.png';
        }

        if (get_theme_mod('header_sticky_logo', false)) {
            $thim_logo_stick_logo_src = get_theme_mod('header_sticky_logo');
            if (is_numeric($thim_logo_stick_logo_src)) {
                $logo_attachment = wp_get_attachment_image_src($thim_logo_stick_logo_src, 'full');
                $thim_logo_stick_logo_src = $logo_attachment[0];
            }
        }

        echo '<a class="sticky-logo" href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name', 'display')) . ' - ' . esc_attr(get_bloginfo('description')) . '" rel="home">';
        echo '<img class="logo" src="' . esc_url($thim_logo_stick_logo_src) . '" alt="' . esc_attr(get_bloginfo('name', 'display')) . '" />';
        echo '</a>';

    }
}
add_action('thim_header_sticky_logo', 'thim_header_sticky_logo');

/**
 * Get Page Title Content For Single
 *
 * @return string HTML for Page title bar
 */
function thim_get_single_page_title_content()
{
    $post_id = get_the_ID();

    if (get_post_type($post_id) == 'post') {
        $categories = get_the_category();
    } elseif (get_post_type($post_id) == 'attachment') {
        echo '<h2 class="title">' . esc_html('Attachment') . '</h2>';

        return;
    } else {// Custom post type
        $categories = get_the_terms($post_id, 'taxonomy');
    }
    if (!empty($categories)) {
        echo '<h2 class="title">' . esc_html($categories[0]->name) . '</h2>';
    }
}

/**
 * Get Page Title Content For Date Format
 *
 * @return string HTML for Page title bar
 */
function thim_get_page_title_date()
{
    if (is_year()) {
        echo '<h2 class="title">' . esc_html__('Year', 'hotel-wp') . '</h2>';
    } elseif (is_month()) {
        echo '<h2 class="title">' . esc_html__('Month', 'hotel-wp') . '</h2>';
    } elseif (is_day()) {
        echo '<h2 class="title">' . esc_html__('Day', 'hotel-wp') . '</h2>';
    }

    $date = '';
    $day = intval(get_query_var('day'));
    $month = intval(get_query_var('monthnum'));
    $year = intval(get_query_var('year'));
    $m = get_query_var('m');

    if (!empty($m)) {
        $year = intval(substr($m, 0, 4));
        $month = intval(substr($m, 4, 2));
        $day = substr($m, 6, 2);

        if (strlen($day) > 1) {
            $day = intval($day);
        } else {
            $day = 0;
        }
    }

    if ($day > 0) {
        $date .= $day . ' ';
    }
    if ($month > 0) {
        global $wp_locale;
        $date .= $wp_locale->get_month($month) . ' ';
    }
    $date .= $year;
    echo '<div class="description">' . esc_attr($date) . '</div>';
}

/**
 * Get breadcrumb for page
 *
 * @return string
 */
function thim_get_breadcrumb_items_other()
{
    global $author;
    $userdata = get_userdata($author);
    $categories = get_the_category();
    if (is_front_page()) { // Do not display on the homepage
        return;
    }
    if (is_home()) {
        echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . esc_attr(get_the_title()) . '">' . esc_attr(get_the_title(get_option('page_for_posts', true))) . '</span></li>';
    } else if (is_category()) {
        echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name">' . esc_html($categories[0]->cat_name) . '</span></li>';
    } else if (is_tag()) {
        echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . esc_attr(single_term_title('', false)) . '">' . esc_html(single_term_title('', false)) . '</span></li>';
    } else if (is_year()) {
        echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . esc_attr(get_the_time('Y')) . '">' . esc_html(get_the_time('Y')) . ' ' . esc_html__('Archives', 'hotel-wp') . '</span></li>';
    } else if (is_author()) {
        echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . esc_attr($userdata->display_name) . '">' . esc_html__('Author', 'hotel-wp') . ' ' . esc_html($userdata->display_name) . '</span></li>';
    } else if (get_query_var('paged')) {
        echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . esc_attr__('Page', 'hotel-wp') . ' ' . get_query_var('paged') . '">' . esc_html__('Page', 'hotel-wp') . ' ' . esc_html(get_query_var('paged')) . '</span></li>';
    } else if (is_search()) {
        echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . esc_attr__('Search results for:', 'hotel-wp') . ' ' . esc_attr(get_search_query()) . '">' . esc_html__('Search results for:', 'hotel-wp') . ' ' . esc_html(get_search_query()) . '</span></li>';
    } elseif (is_404()) {
        echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . esc_attr__('404 Error', 'hotel-wp') . '">' . esc_html__('404 Error', 'hotel-wp') . '</span></li>';
    } elseif (is_post_type_archive()) {
        echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . post_type_archive_title('', false) . '">' . post_type_archive_title('', false) . '</span></li>';
    } elseif (is_tax()) {
        echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . single_term_title('', false) . '">' . single_term_title('', false) . '</span></li>';
    }
}

/**
 * Get content breadcrumbs
 *
 * @return string
 */
if (!function_exists('thim_breadcrumbs')) {
    function thim_breadcrumbs()
    {
        global $post;
        $categories = get_the_category();
        $thim_options = get_theme_mods();
        $icon = '';
        if (isset($thim_options['breadcrumb_icon'])) {
            $icon = html_entity_decode(get_theme_mod('breadcrumb_icon'));
        }
        // Build the breadcrums
        echo '<ul itemprop="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList" id="breadcrumbs" class="breadcrumbs">';
        echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url(home_url('/')) . '" title="' . esc_attr__('Home', 'hotel-wp') . '"><span itemprop="name">' . esc_html__('Home', 'hotel-wp') . '</span></a><span class="breadcrum-icon">' . ent2ncr($icon) . '</span></li>';
        if (is_single()) { // Single post (Only display the first category)
            if (isset($categories[0])) {
                echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url(get_category_link($categories[0]->term_id)) . '" title="' . esc_attr($categories[0]->cat_name) . '"><span itemprop="name">' . esc_html($categories[0]->cat_name) . '</span></a><span class="breadcrum-icon">' . ent2ncr($icon) . '</span></li>';
            } elseif ($terms = get_the_terms(get_the_ID(), 'hb_room_type')) {
                if (!is_wp_error($terms)) {
                    echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url(get_term_link($terms[0]->term_id, 'hb_room_type')) . '" title="' . esc_attr($terms[0]->name) . '"><span itemprop="name">' . esc_html($terms[0]->name) . '</span></a><span class="breadcrum-icon">' . ent2ncr($icon) . '</span></li>';
                }
            }
            echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . esc_attr(get_the_title()) . '">' . esc_html(get_the_title()) . '</span></li>';
        } else if (is_page()) {
            // Standard page
            if ($post->post_parent) {
                $anc = get_post_ancestors($post->ID);
                $anc = array_reverse($anc);
                // Parent page loop
                foreach ($anc as $ancestor) {
                    echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url(get_permalink($ancestor)) . '" title="' . esc_attr(get_the_title($ancestor)) . '"><span itemprop="name">' . esc_html(get_the_title($ancestor)) . '</span></a><span class="breadcrum-icon">' . ent2ncr($icon) . '</span></li>';
                }
            }
            // Current page
            echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . esc_attr(get_the_title()) . '"> ' . esc_html(get_the_title()) . '</span></li>';
        } elseif (is_day()) {// Day archive
            // Year link
            echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url(get_year_link(get_the_time('Y'))) . '" title="' . esc_attr(get_the_time('Y')) . '"><span itemprop="name">' . esc_html(get_the_time('Y')) . ' ' . esc_html__('Archives', 'hotel-wp') . '</span></a><span class="breadcrum-icon">' . ent2ncr($icon) . '</span></li>';
            // Month link
            echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url(get_month_link(get_the_time('Y'), get_the_time('m'))) . '" title="' . esc_attr(get_the_time('M')) . '"><span itemprop="name">' . esc_html(get_the_time('M')) . ' ' . esc_html__('Archives', 'hotel-wp') . '</span></a><span class="breadcrum-icon">' . ent2ncr($icon) . '</span></li>';
            // Day display
            echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . esc_attr(get_the_time('jS')) . '"> ' . esc_html(get_the_time('jS')) . ' ' . esc_html(get_the_time('M')) . ' ' . esc_html__('Archives', 'hotel-wp') . '</span></li>';

        } else if (is_month()) {
            // Year link
            echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url(get_year_link(get_the_time('Y'))) . '" title="' . esc_attr(get_the_time('Y')) . '"><span itemprop="name">' . esc_html(get_the_time('Y')) . ' ' . esc_html__('Archives', 'hotel-wp') . '</span></a><span class="breadcrum-icon">' . ent2ncr($icon) . '</span></li>';
            echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . esc_attr(get_the_time('M')) . '">' . esc_html(get_the_time('M')) . ' ' . esc_html__('Archives', 'hotel-wp') . '</span></li>';
        }
        thim_get_breadcrumb_items_other();
        echo '</ul>';
    }
}

/**
 * Get list sidebars
 *
 * @return string
 */
if (!function_exists('thim_get_list_sidebar')) {
    function thim_get_list_sidebar()
    {
        global $wp_registered_sidebars;

        $sidebar_array = array();
        $dp_sidebars = $wp_registered_sidebars;

        $sidebar_array[''] = esc_attr__('-- Select Sidebar --', 'hotel-wp');

        foreach ($dp_sidebars as $sidebar) {
            $sidebar_array[$sidebar['name']] = $sidebar['name'];
        }

        return $sidebar_array;
    }
}

/**
 * Turn on and get the back to top
 *
 * @return string HTML for the back to top
 */
if (!class_exists('thim_back_to_top')) {
    function thim_back_to_top()
    {
        if (get_theme_mod('feature_backtotop', true)) {
            get_template_part('templates/footer/back-to-top');
        }
    }
}
add_action('thim_space_body', 'thim_back_to_top', 10);

/**
 * Switch footer layout
 *
 * @return string HTML footer layout
 */
if (!function_exists('thim_footer_layout')) {
    function thim_footer_layout()
    {
        $template_name = 'templates/footer/' . get_theme_mod('footer_template', 'default');
        get_template_part($template_name);
    }
}

/**
 * Footer Widgets
 *
 * @return bool
 * @return string
 */
if (!function_exists('thim_footer_widgets')) {
    function thim_footer_widgets()
    {
        $thim_options = get_theme_mods();
        $wd_column = array("4", "2", "2", "4");
        if (isset($thim_options['footer_width_column'])) {
            $width = preg_replace('/\s+/', '', $thim_options['footer_width_column']);
            $wd_column = explode('+', $width);
        }
        if (get_theme_mod('footer_widgets', true)) : ?>
            <div class="footer-sidebars">
                <?php
                for ($i = 1; $i <= get_theme_mod('footer_columns', 4); $i++): ?>
                    <div class="footer-sidebar col-sm-<?php echo esc_attr($wd_column[$i - 1]); ?>">
                        <?php dynamic_sidebar('footer-sidebar-' . $i); ?>
                    </div>
                <?php endfor; ?>
            </div>
        <?php endif;
    }
}

/**
 * Footer Copyright bar
 *
 * @return bool
 * @return string
 */
if (!function_exists('thim_copyright_bar')) {
    function thim_copyright_bar()
    {
        $copyright_text = get_theme_mod('copyright_text', true);
        $link_default = sprintf('Designed by <a href="%1$s" ref="nofollow">ThimPress</a>. Powered by WordPress', esc_url('https://thimpress.com'));
        if ($copyright_text) { ?>
            <p class="copyright-text">
                <?php
                $copyright_text = get_theme_mod('copyright_text', $link_default);
                echo wp_kses($copyright_text, array('a' => array('href' => array())));
                ?>
            </p>
        <?php }
    }
}

/**
 * Theme Feature: RTL Support.
 *
 * @return @string
 */
//if ( ! function_exists( 'thim_feature_rtl_support' ) ) {
//	function thim_feature_rtl_support() {
//		if ( get_theme_mod( 'feature_rtl_support', false ) ) {
//			echo " dir=\"rtl\"";
//		}
//	}
//
//	add_filter( 'language_attributes', 'thim_feature_rtl_support' );
//}


/**
 * Theme Feature: Open Graph insert doctype
 *
 * @param $output
 */
if (!function_exists('thim_doctype_opengraph')) {
    function thim_doctype_opengraph($output)
    {
        if (get_theme_mod('feature_open_graph_meta', true)) {
            return $output . ' prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#"';
        }
    }

    add_filter('language_attributes', 'thim_doctype_opengraph');
}

/**
 * Theme Feature: Preload
 *
 * @return bool
 * @return string HTML for preload
 */
if (!function_exists('thim_preloading')) {
    function thim_preloading()
    {
        $preloading = get_theme_mod('theme_feature_preloading', 'off');
        $preloading_image = get_theme_mod('theme_feature_preloading_custom_image', false);

        if ($preloading != 'off') {

            echo '<div id="thim-preloading">';
            include(get_template_directory() . '/templates/features/preloading/' . $preloading . '.php');
            echo '</div>';

        }
    }

    add_action('thim_before_body', 'thim_preloading', 10);
}

/**
 * Theme Feature: Open Graph meta tag
 *
 * @param string
 */
if (!function_exists('thim_add_opengraph')) {
    function thim_add_opengraph()
    {
        global $post;

        if (get_theme_mod('feature_open_graph_meta', true)) {
            if (is_single()) {
                if (has_post_thumbnail($post->ID)) {
                    $img_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');
                    $img_src = esc_attr($img_src[0]);
                } else {
                    $img_src = THIM_URI . 'assets/images/opengraph.png';
                }
                if ($excerpt = $post->post_excerpt) {
                    $excerpt = strip_tags($post->post_excerpt);
                    $excerpt = str_replace("", "'", $excerpt);
                } else {
                    $excerpt = get_bloginfo('description');
                }
                ?>

                <meta property="og:title" content="<?php echo the_title(); ?>"/>
                <meta property="og:description" content="<?php echo esc_attr($excerpt); ?>"/>
                <meta property="og:type" content="article"/>
                <meta property="og:url" content="<?php the_permalink(); ?>"/>
                <meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
                <meta property="og:image" content="<?php echo esc_attr($img_src); ?>"/>

                <?php
            } else {
                return;
            }
        }
    }

    add_action('wp_head', 'thim_add_opengraph', 10);
}


/**
 * Theme Feature: Google theme color
 */
if (!function_exists('thim_google_theme_color')) {
    function thim_google_theme_color()
    {
        if (get_theme_mod('feature_google_theme', false)) { ?>
            <meta name="theme-color"
                  content="<?php echo esc_attr(get_theme_mod('feature_google_theme_color', '#333333')) ?>">
            <?php
        }
    }

    add_action('wp_head', 'thim_google_theme_color', 10);
}

/**
 * Responsive: enable or disable responsive
 *
 * @return string
 * @return bool
 */
if (!function_exists('thim_enable_responsive')) {
    function thim_enable_responsive()
    {
        if (get_theme_mod('enable_responsive', true)) {
            echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
        }
    }

    add_action('wp_head', 'thim_enable_responsive', 1);
}

/**
 * Override ajax-loader contact form
 *
 * $return mixed
 */

function thim_wpcf7_ajax_loader()
{
    return THIM_URI . 'assets/images/icons/ajax-loader.gif';
}

add_filter('wpcf7_ajax_loader', 'thim_wpcf7_ajax_loader');

/**
 * Redirect view single in our team plugin
 */
function thim_redirect_our_team_single()
{
    $queried_post_type = get_query_var('post_type');
    if (is_single() && 'our_team' == $queried_post_type) {
        wp_redirect(home_url('/'), 301);
        exit;
    }
}

add_action('template_redirect', 'thim_redirect_our_team_single');

/**
 * Get feature image
 *
 * @param int $width
 * @param int $height
 * @param bool $link
 *
 * @return string
 */
function thim_feature_image($width = 1024, $height = 768, $link = true)
{
    global $post;
    if (has_post_thumbnail()) {
        if ($link != true && $link != false) {
            the_post_thumbnail($post->ID, $link);
        } else {
            $get_thumbnail = simplexml_load_string(get_the_post_thumbnail($post->ID, 'full'));
            if ($get_thumbnail) {
                $thumbnail_src = $get_thumbnail->attributes()->src;
                $img_url = $thumbnail_src;
                if ($link) {
                    $image_crop = thim_aq_resize($img_url[0], $width, $height, true);
                    $image_crop = $image_crop ? $image_crop : $img_url[0];

                    echo '<div class="thumbnail"><a href="' . esc_url(get_permalink()) . '" title = "' . get_the_title() . '">';
                    echo '<img src="' . esc_url($image_crop) . '" alt= "' . get_the_title() . '" title = "' . get_the_title() . '" />';
                    echo '</a></div>';
                } else {
                    $image_crop = thim_aq_resize($img_url[0], $width, $height, true);
                    $image_crop = $image_crop ? $image_crop : $img_url[0];

                    return '<img src="' . esc_url($image_crop) . '" alt= "' . get_the_title() . '" title = "' . get_the_title() . '" />';
                }
            }
        }
    }
}

/**
 * aq_resize function fake.
 * Aq_Resize
 */
if (!class_exists('TP')) {
    function thim_aq_resize($url, $width = null, $height = null, $crop = null, $single = true, $upscale = false)
    {
        return $url;
    }
}

/**
 * Add filter for call style for input datetime
 *
 */
add_filter('wpcf7_support_html5_fallback', '__return_true');

/**
 * Copyright menu
 *
 * @return bool
 * @return array
 */
if (!function_exists('thim_copyright_menu')) {
    function thim_copyright_menu()
    {
        if (get_theme_mod('copyright_menu', true)) :
            if (has_nav_menu('copyright_menu')) {
                wp_nav_menu(array(
                    'theme_location' => 'copyright_menu',
                    'container' => false,
                    'depth' => 1,
                    'items_wrap' => '<ul id="copyright-menu" class="list-inline">%3$s</ul>',
                ));
            }
        endif;
    }
}

/**
 * Custom excerpt
 *
 * @param $limit
 *
 * @return array|mixed|string|void
 */
function thim_excerpt($limit)
{
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . '...';
    } else {
        $excerpt = implode(" ", $excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

    return '<p>' . $excerpt . '</p>';
}


function thim_dns_prefetch()
{
    if (function_exists('display_instagram')) {
        echo "<link rel='dns-prefetch' href='//scontent.cdninstagram.com' />";
        echo "<link rel='dns-prefetch' href='//api.instagram.com' />";
    }
}

add_action('wp_head', 'thim_dns_prefetch');

/**
 * Display post thumbnail by default
 *
 * @param $size
 */
function thim_default_get_post_thumbnail($size)
{
    if (thim_plugin_active('thim-core')) {
        return;
    }
    if (get_the_post_thumbnail(get_the_ID(), $size)) {
        ?>
        <div class='post-formats-wrapper'>
            <a class="post-image" href="<?php echo esc_url(get_permalink()); ?>">
                <?php echo get_the_post_thumbnail(get_the_ID(), $size); ?>
            </a>
        </div>
        <?php
    }
}

add_action('thim_entry_top', 'thim_default_get_post_thumbnail', 20);

/**
 * Get event tabs
 *
 * @return string
 */
if (!function_exists('thim_event_tabs')) {
    add_action('tp_event_before_event_loop', 'thim_event_tabs');

    function thim_event_tabs()
    {
        $count = (array)wp_count_posts('tp_event');

        $status = isset($_COOKIE['status']) ? $_COOKIE['status'] : 'upcoming';


        $happening_active = $upcoming_active = $expired_active = '';
        switch ($status) {
            case 'upcoming':
                $upcoming_active = 'active';
                break;
            case 'expired':
                $expired_active = 'active';
                break;
            default:
                $happening_active = 'active';
                break;
        }
        ?>
        <div class="thim-event-tabs">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="tab happening <?php echo esc_attr($happening_active); ?>" data-tab="happening">
                    <a href="#happening" aria-controls="happening"
                       data-toggle="tab"><?php esc_html_e('Happening', 'hotel-wp'); ?></a>
                </li>
                <li class="tab upcoming <?php echo esc_attr($upcoming_active); ?>" data-tab="upcoming">
                    <a href="#upcoming" aria-controls="upcoming"
                       data-toggle="tab"><?php esc_html_e('Upcoming', 'hotel-wp'); ?></a>
                </li>
                <li class="tab expired <?php echo esc_attr($expired_active); ?>" data-tab="expired">
                    <a href="#expired" aria-controls="expired"
                       data-toggle="tab"><?php esc_html_e('Expired', 'hotel-wp'); ?></a>
                </li>
            </ul>
            <!-- End: Nav tabs -->
        </div>
        <?php
    }
}

/**
 * Set event per page
 *
 * @param $query
 *
 * @return int
 */
function thim_set_event_per_page($query)
{
    if (is_admin() || !$query->is_main_query()) {
        return;
    }

    if (is_post_type_archive('tp_event')) {
        $posts_per_page = get_theme_mod('event_per_page');
        $query->set('posts_per_page', $posts_per_page);

        return;
    }
}

add_action('pre_get_posts', 'thim_set_event_per_page', 1);

/**
 * Get pagination for event
 *
 * $param $wp_query
 * @param $tab
 *
 * @return array
 */
if (!function_exists('thim_event_paging_nav')) :

    function thim_event_paging_nav($wp_query, $tab)
    {
        if ($wp_query->max_num_pages < 2) {
            return;
        }

        $status = isset($_COOKIE['status']) ? $_COOKIE['status'] : 'upcoming';

        if ($status === $tab) {
            $paged = (get_query_var('paged')) ? intval(get_query_var('paged')) : 1;
        } else {
            $paged = 1;
        }
        $pagenum_link = html_entity_decode(get_pagenum_link());

        $query_args = array();
        $url_parts = explode('?', $pagenum_link);

        if (isset($url_parts[1])) {
            wp_parse_str($url_parts[1], $query_args);
        }

        $pagenum_link = esc_url(remove_query_arg(array_keys($query_args), $pagenum_link));
        $pagenum_link = trailingslashit($pagenum_link) . '%_%';

        $format = $GLOBALS['wp_rewrite']->using_index_permalinks() && !strpos($pagenum_link, 'index.php') ? 'index.php/' : '';
        $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit('page/%#%', 'paged') : '?paged=%#%';

        // Set up paginated links.
        $links = paginate_links(array(
            'base' => $pagenum_link,
            'format' => $format,
            'total' => $wp_query->max_num_pages,
            'current' => $paged,
            'mid_size' => 1,
            'add_args' => array_map('urlencode', $query_args),
            'prev_text' => esc_html__('Prev', 'hotel-wp'),
            'next_text' => esc_html__('Next', 'hotel-wp'),
            'type' => 'list'
        ));


        $links = str_replace($status, $tab, $links);

        if ($links) :
            ?>
            <div class="pagination loop-pagination event">
                <?php echo ent2ncr($links); ?>
            </div>
            <!-- .pagination -->
            <?php
        endif;
    }
endif;

/**
 * Change layout donate
 *
 * @return string
 */
add_action('wp_ajax_thim_session_event_tab_active', 'thim_session_event_tab_active');
add_action('wp_ajax_nopriv_thim_session_event_tab_active', 'thim_session_event_tab_active');
function thim_session_event_tab_active()
{
    $tab = $_POST['tab'];
    $_SESSION['thim_session_event_tab_active'] = $tab;
    $output['tab'] = $_SESSION['thim_session_event_tab_active'];
    die(json_encode($output));
}

add_action('wp_ajax_status_event_ajax', 'status_event_ajax_call_back');
add_action('wp_ajax_nopriv_status_event_ajax', 'status_event_ajax_call_back');

function status_event_ajax_call_back()
{
    $status = isset($_GET['status']) ? $_GET['status'] : 'happening';
    setcookie('status', $status, 1 * DAYS_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN);
    die();
}


/**
 * Add metabox event
 *
 * @return string
 */
function thim_add_metabox_event_location()
{
    global $post;
    $post_id = $post->ID;
    $prefix = 'tp_event_';
    $location = get_post_meta($post_id, $prefix . 'location', true);
    ?>
    <div class="option_group">
        <p class="form-field">
            <label for="_time_end"><?php esc_html_e('Address', 'hotel-wp') ?></label>
            <input type="text" class="short" name="<?php echo esc_attr($prefix) ?>location" id="_location"
                   value="<?php echo esc_attr($location) ?>">
        </p>
    </div>
    <?php
}

add_action('event_admin_metabox_before_fields', 'thim_add_metabox_event_location');

/**
 * Get book event form
 *
 * @return string
 */
function thim_book_event()
{
    if (class_exists('TP_Event_Authentication') && is_singular('tp_event')) {
        echo '<aside id="thim-book-event" class="thim-book-event">';
        $event = new Auth_Event(get_the_ID());
        $registered_time = $event->booked_quantity(get_current_user_id());
        ob_start();
        if (get_post_status(get_the_ID()) === 'tp-event-expired') {
            event_auth_print_notice('error', sprintf('%s %s', get_the_title(get_the_ID()), esc_html__('has been expired', 'hotel-wp')));
        } else if ($event->is_free() && $registered_time && event_get_option('email_register_times') === 'once') {
            event_auth_print_notice('error', esc_html__('You have registered this event before.', 'hotel-wp'));
        } else {
            tpe_auth_addon_get_template('form-book-event.php', array('event_id' => get_the_ID()));
        }
        echo ob_get_clean();
        echo '</aside>';
    } else if (class_exists('WPEMS') && is_singular('tp_event')) {
        echo '<aside id="thim-book-event" class="thim-book-event">';
        $event = new WPEMS_Event(get_the_ID());
        $registered_time = $event->booked_quantity(get_current_user_id());
        ob_start();
        if (get_post_status(get_the_ID()) === 'tp-event-expired') {
            wpems_get_template('loop/booking-form.php', array('event_id' => get_the_ID()));
        } else if ($event->is_free() && $registered_time && event_get_option('email_register_times') === 'once') {
            wpems_print_notice('error', esc_html__('You have registered this event before.', 'hotel-wp'));
        } else {
            wpems_get_template('loop/booking-form.php', array('event_id' => get_the_ID()));
        }
        echo ob_get_clean();
        echo '</aside>';
    }
}

add_action('thim_sidebar_event_before', 'thim_book_event', 10);

if (class_exists('TP_Event_Authentication')) {
    //Remove action single event
    remove_action('tp_event_after_loop_event_item', 'event_auth_register');
    remove_action('tp_event_after_single_event', 'event_auth_register');
}

/**
 * Get hb social share
 *
 * @return string
 */
if (!function_exists('thim_hb_social_share')) {
    function thim_hb_social_share()
    {
        $thim_options = get_theme_mods();

        echo '<ul class="thim-social-share popup">';

        if (isset($thim_options['hotel_group_sharing'])) {
            $socials = get_theme_mod('hotel_group_sharing');
        } else {
            $socials = array('facebook', 'twitter', 'google');
        }

        foreach ($socials as $social) {
            thim_hd_render_social_link($social);
        }

        echo '</ul>';
    }
}

add_action('hotel_booking_single_room_title', 'thim_hb_social_share');

/**
 * Render hb social share
 *
 * @param $social_name
 *
 * @return string
 */
function thim_hd_render_social_link($social_name)
{
    switch ($social_name) {
        case 'twitter':
            echo '<li><a target="_blank" class="twitter" href="' . esc_url('https://twitter.com/share?url=' . urlencode(get_permalink()) . '&amp;text=' . esc_attr(get_the_title())) . '" title="' . esc_html__('Twitter', 'hotel-wp') . '"><i class="fa fa-twitter"></i></a></li>';
            break;

        case 'facebook':
            echo '<li><a target="_blank" class="facebook"  href="https://www.facebook.com/sharer.php?u=' . urlencode(get_permalink()) . '" title="' . esc_attr__('Facebook', 'hotel-wp') . '"><i class="fa fa-facebook"></i></a></li>';
            break;

        case 'pinterest':
            echo '<li><a target="_blank" class="pinterest" href="' . esc_url('http://pinterest.com/pin/create/button/?url=' . urlencode(get_permalink()) . '&amp;description=' . get_the_excerpt() . '&media=' . urlencode(wp_get_attachment_url(get_post_thumbnail_id()))) . '"  title="' . esc_html__('Pinterest', 'hotel-wp') . '"><i class="fa fa-pinterest"></i></a></li>';
            break;

        case 'google':
            echo '<li><a target="_blank" class="googleplus" href="' . esc_url('https://plus.google.com/share?url=' . urlencode(get_permalink()) . '&amp;title=' . esc_attr(get_the_title())) . '" title="' . esc_html__('Google Plus', 'hotel-wp') . '"><i class="fa fa-google"></i></a></li>';
            break;

        default:
            break;
    }
}

/**
 * Set post per page hb related
 *
 * @param $query
 */
function thim_hb_related_post_limit($query)
{
    if (is_single() && get_post_type() == 'hb_room') {
        global $hb_settings;
        if (isset($query->query_vars['meta_query']) && !empty($query->query_vars['meta_query'])) {
            foreach ($query->query_vars['meta_query'] as $meta) {
                if (is_array($meta) && in_array('_hb_max_child_per_room', $meta)) {
                    $query->query_vars['posts_per_page'] = $hb_settings->get('catalog_number_column', 4);
                }
            }
        }
    }
}

add_action('pre_get_posts', 'thim_hb_related_post_limit', 99999);

/**
 * Custom posts per page for Room Type
 *
 * @param $query
 */
function thim_custom_room_type_posts_per_page($query)
{
    if (is_tax('hb_room_type')) {
        global $hb_settings;
        $query->query_vars['posts_per_page'] = $hb_settings->get('posts_per_page');

        return;
    }
}

add_filter('pre_get_posts', 'thim_custom_room_type_posts_per_page');

/**
 * Show room type
 *
 * @return string
 */
add_action('hotel_booking_loop_room_title', 'thim_bh_show_room_types');
function thim_bh_show_room_types()
{
    $thim_options = get_theme_mods();
    $style_room = isset($thim_options['room_style']) ? $thim_options['room_style'] : 'style-1';
    if ($style_room == 'style-1') {
        the_terms(get_the_ID(), 'hb_room_type', '<div class="room-types">', '<span class="sep"></span>', '</div>');
    }
}

/**
 * Add button on single room
 *
 * @return string
 */
function thim_single_add_button()
{
    if (get_theme_mod('enable_book', true)) {
        if (is_singular('hb_room')) {
            if (class_exists('WP_Hotel_Booking')) {
                get_template_part('wp-hotel-booking-room/single-search', 'button');
            } else {
                get_template_part('tp-hotel-booking-room/single-search', 'button');
            }
        }
    }
}

add_action('thim_sidebar_before', 'thim_single_add_button', 10);

/**
 * Check is hotel
 *
 * @return boolean
 */
function thim_is_hotel()
{
    if ((!class_exists('TP_Hotel_Booking')) && (!class_exists('WP_Hotel_Booking'))) {
        return false;
    }

    global $hb_settings;

    if (get_post_type() == 'hb_room' || is_page($hb_settings->get('search_page_id'))) {
        return true;
    } else {
        return false;
    }
}

if (class_exists('WP_Hotel_Booking_Room')) {
    remove_action('hotel_booking_single_room_title', array(
        WP_Hotel_Booking_Room()->booking,
        'single_add_button'
    ), 9);
}

if (class_exists('TP_Hotel_Booking_Room')) {
    remove_action('hotel_booking_single_room_title', array(
        TP_Hotel_Booking_Room()->booking,
        'single_add_button'
    ), 9);
}


function thim_main_menu_fallback()
{
    esc_html_e('Please add a menu to primary location', 'hotel-wp');
}

/*
 *  Custom Info Post
 */

function thim_custom_meta()
{
    add_meta_box('thim-info', esc_html__('Infomation Posts', 'hotel-wp'), 'thim_meta_callback', 'post');
}

function thim_meta_callback($post)
{
    $values = get_post_custom($post->ID);
    $text = isset($values['thim_info']) ? esc_attr($values['thim_info'][0]) : '';

    // We'll use this nonce field later on when saving.
    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');
    ?>
    <p>
    <div class="thim-row-content">
        <label for="thim_info"><?php esc_html__('Infomation Posts', 'hotel-wp') ?></label>
        <textarea rows="2" name="thim_info" id="thim_info" style="width:100%"><?php echo $text; ?></textarea>
    </div>
    </p>

    <?php
}

add_action('add_meta_boxes', 'thim_custom_meta');

function thim_meta_save($post_id, $post)
{

    // Bail if we're doing an auto save
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // if our nonce isn't there, or we can't verify it, bail
    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) {
        return;
    }

    // if our current user can't edit this post, bail
    if (!current_user_can('edit_post')) {
        return;
    }

    // now we can actually save the data
    $allowed = array(
        'a' => array( // on allow a tags
            'href' => array() // and those anchors can only have href attribute
        )
    );

    // Make sure your data is set before trying to save it
    if (isset($_POST['thim_info'])) {
        update_post_meta($post_id, 'thim_info', wp_kses($_POST['thim_info'], $allowed));
    }

}

add_action('save_post', 'thim_meta_save', 10, 2);

/**
 * Add google analytics & facebook pixel code
 */
if (!function_exists('thim_add_marketing_code')) {
    function thim_add_marketing_code()
    {
        $theme_options_data = get_theme_mods();
        if (!empty($theme_options_data['thim_google_analytics'])) {
            ?>
            <script>
                (function (i, s, o, g, r, a, m) {
                    i['GoogleAnalyticsObject'] = r;
                    i[r] = i[r] || function () {
                            (i[r].q = i[r].q || []).push(arguments)
                        }, i[r].l = 1 * new Date();
                    a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                    a.async = 1;
                    a.src = g;
                    m.parentNode.insertBefore(a, m)
                })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

                ga('create', '<?php echo $theme_options_data['thim_google_analytics']; ?>', 'auto');
                ga('send', 'pageview');
            </script>
            <?php
        }
    }
}
add_action('wp_footer', 'thim_add_marketing_code');