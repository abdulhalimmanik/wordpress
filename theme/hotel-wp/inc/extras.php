<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Hotel-WP
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */
function thim_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

    if ( get_theme_mod( 'background_boxed_type', 'image' ) == 'image' ) {
        $classes[] = 'bg-type-image';
    } else {
        $classes[] = 'bg-type-' . get_theme_mod( 'background_boxed_type', 'color' );
    }

	if ( get_theme_mod( 'enable_responsive', true ) ) {
		$classes[] = 'responsive';
	} else {
		$classes[] = 'disable-responsive';
	}

	if ( get_theme_mod( 'enable_box_shadow', true ) ) {
		$classes[] = 'box-shadow';
	}

	if ( get_theme_mod( 'feature_rtl_support', true ) ) {
		$classes[] = 'class-rtl';
	}

	if ( get_theme_mod( 'mobile_menu_position' ) == 'creative-left' ) {
		$classes[] = 'creative-left';
	} else {
		$classes[] = 'creative-right';
	}

	return $classes;
}

add_filter( 'body_class', 'thim_body_classes' );

/**
 * Primary menu
 */
function thim_primary_menu() {
	if ( has_nav_menu( 'primary' ) ) {
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'container'      => false,
			'items_wrap'     => '%3$s'
		) );
	} else {
		wp_nav_menu( array(
			'theme_location' => '',
			'container'      => false,
			'items_wrap'     => '%3$s'
		) );
	}
}

/**
 * Display the classes for the #wrapper-container element.
 *
 * @param string|array $class One or more classes to add to the class list.
 */
function thim_wrapper_container_class( $class = '' ) {
	// Separates classes with a single space, collates classes for body element
	echo 'class="' . join( ' ', thim_get_wrapper_container_class( $class ) ) . '"';
}

/**
 * Retrieve the classes for the #wrapper-container element as an array.
 *
 * @param string|array $class One or more classes to add to the class list.
 *
 * @return array Array of classes.
 */
function thim_get_wrapper_container_class( $class = '' ) {

	$classes = array();

	if ( ! empty( $class ) ) {
		if ( ! is_array( $class ) ) {
			$class = preg_split( '#\s+#', $class );
		}
		$classes = array_merge( $classes, $class );
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}

	$classes = array_map( 'esc_attr', $classes );

	/**
	 * Filter the list of CSS #wrapper-container classes
	 *
	 * @param array $classes An array of #wrapper-container classes.
	 * @param array $class   An array of additional classes added to the #wrapper-container.
	 */
	$classes = apply_filters( 'thim_wrapper_container_class', $classes, $class );

	return array_unique( $classes );
}


/**
 * Adds custom classes to the array of #wrapper-container classes.
 *
 * @param array $classes Classes for the #wrapper-container element.
 *
 * @return array
 */
function thim_wrapper_container_classes( $classes ) {

	$classes[] = 'content-pusher';

	if ( get_theme_mod( 'box_content_layout' ) == 'boxed' ) {
		$classes[] = 'boxed-area';
	}

	return $classes;
}

add_filter( 'thim_wrapper_container_class', 'thim_wrapper_container_classes' );


/**
 * Display the classes for the #main-content element.
 *
 * @param string|array $class One or more classes to add to the class list.
 */
function thim_main_content_class( $class = '' ) {
	// Separates classes with a single space, collates classes for body element
	echo 'class="' . join( ' ', thim_get_main_content_class( $class ) ) . '"';
}

/**
 * Retrieve the classes for the #main-content element as an array.
 *
 * @param string|array $class One or more classes to add to the class list.
 *
 * @return array Array of classes.
 */
function thim_get_main_content_class( $class = '' ) {

	$classes = array();

	if ( ! empty( $class ) ) {
		if ( ! is_array( $class ) ) {
			$class = preg_split( '#\s+#', $class );
		}
		$classes = array_merge( $classes, $class );
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}

	$classes = array_map( 'esc_attr', $classes );

	/**
	 * Filter the list of CSS #main-content classes
	 *
	 * @param array $classes An array of #main-content classes.
	 * @param array $class   An array of additional classes added to the #main-content
	 */
	$classes = apply_filters( 'thim_main_content_class', $classes, $class );

	return array_unique( $classes );
}


/**
 * Adds custom classes to the array of #main-content classes.
 *
 * @param array $classes Classes for the #main-content element.
 *
 * @return array
 */
function thim_main_content_classes( $classes ) {

	$classes[] = 'bg-type-' . get_theme_mod( 'background_main_type', 'color' );

	return $classes;
}

add_filter( 'thim_main_content_class', 'thim_main_content_classes' );


/**
 * Add lang to html tag
 *
 * @return @string
 */
if ( ! function_exists( 'thim_language_attributes' ) ) {
	function thim_language_attributes() {
		echo 'lang="' . get_bloginfo( 'language' ) . '"';
	}

	add_filter( 'language_attributes', 'thim_language_attributes', 10 );
}

/**
 * Optimize: script_version
 */

function thim_optimize_remove_script_version( $src ) {
	$parts = explode( '?ver', $src );

	return $parts[0];
}

add_filter( 'script_loader_src', 'thim_optimize_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', 'thim_optimize_remove_script_version', 15, 1 );


/**
 * Support SSL (https)
 */
function thim_ssl_secure_url( $sources ) {
	$scheme = parse_url( site_url(), PHP_URL_SCHEME );
	if ( 'https' == $scheme ) {
		if ( stripos( $sources, 'http://' ) === 0 ) {
			$sources = 'https' . substr( $sources, 4 );
		}

		return $sources;
	}

	return $sources;
}

function thim_ssl_secure_image_srcset( $sources ) {
	$scheme = parse_url( site_url(), PHP_URL_SCHEME );
	if ( 'https' == $scheme ) {
		foreach ( $sources as &$source ) {
			if ( stripos( $source['url'], 'http://' ) === 0 ) {
				$source['url'] = 'https' . substr( $source['url'], 4 );
			}
		}

		return $sources;
	}

	return $sources;
}

add_filter( 'wp_calculate_image_srcset', 'thim_ssl_secure_image_srcset' );
add_filter( 'wp_get_attachment_url', 'thim_ssl_secure_url', 1000 );
add_filter( 'image_widget_image_url', 'thim_ssl_secure_url' );


/**
 *
 * Coming soon mode
 *
 * @return mixed|void
 */
function thim_metabox_comingsoon_mode( $meta_boxes ) {
	$prefix = 'thim_comingsoon_';

	$meta_boxes[] = array(
		'id'         => $prefix . 'mode',
		'title'      => esc_html__( 'Coming Soon Mode - Settings', 'hotel-wp' ),
		'post_types' => array( 'page' ),
		'context'    => 'normal',
		'priority'   => 'high',
		'show'       => array(
			'template' => array( 'templates/comingsoon.php' ),
		),
		'fields'     => array(
			array(
				'name' => esc_html__( 'Date', 'hotel-wp' ),
				'id'   => $prefix . 'date',
				'type' => 'datetime',
			),
			array(
				'name'             => esc_html__( 'Background Images', 'hotel-wp' ),
				'id'               => $prefix . 'background_images',
				'type'             => 'image_advanced',
				'max_file_uploads' => 10,
			),
		),
	);

	return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'thim_metabox_comingsoon_mode' );


function thim_admin_notice_active( $arg ) {
	$array       = explode( '-', $arg );
	$length      = array_pop( $array );
	$option_name = implode( '-', $array );
	$db_record   = get_site_transient( $option_name );
	if ( 'forever' == $db_record ) {
		return false;
	} elseif ( absint( $db_record ) >= time() ) {
		return false;
	} else {
		return true;
	}
}

/**
 * Handles Ajax request to persist notices dismissal.
 * Uses check_ajax_referer to verify nonce.
 */
add_action( 'wp_ajax_thim_dismiss_admin_notice', 'thim_dismiss_admin_notice' );
function thim_dismiss_admin_notice() {
	$option_name        = sanitize_text_field( $_POST['option_name'] );
	$dismissible_length = sanitize_text_field( $_POST['dismissible_length'] );
	$transient          = 0;
	if ( 'forever' != $dismissible_length ) {
		$transient          = absint( $dismissible_length ) * DAY_IN_SECONDS;
		$dismissible_length = strtotime( absint( $dismissible_length ) . ' days' );
	}
	check_ajax_referer( 'dismissible-notice', 'nonce' );
	$dismiss = set_site_transient( $option_name, $dismissible_length, $transient );
	wp_die( $dismiss );
}

/**
 * Enqueue javascript and variables.
 */
add_action( 'admin_enqueue_scripts', 'thim_admin_load_script' );
function thim_admin_load_script() {
	wp_enqueue_script(
		'dismissible-notices',
		THIM_URI . 'inc/admin/assets/scripts.js',
		array( 'jquery', 'common' ),
		false,
		true
	);
	wp_localize_script(
		'dismissible-notices',
		'dismissible_notice',
		array(
			'nonce' => wp_create_nonce( 'dismissible-notice' ),
		)
	);
}