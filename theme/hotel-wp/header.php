<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

?><!DOCTYPE html>
<html itemscope itemtype="http://schema.org/WebPage" <?php if ( get_theme_mod( 'feature_rtl_support', false ) ) {echo " dir=\"rtl\"";}; ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php do_action( 'thim_space_head' ); ?>
	<?php wp_head(); ?>
</head>

<body <?php if ( get_theme_mod( 'header_style' ) == 'header_v4'  ) { body_class('thim-home-3'); } else { body_class(); } ?>>

<?php do_action( 'thim_before_body' ); ?>

<?php if ( ! is_page_template( 'templates/comingsoon.php' ) ) : ?>
	<nav class="visible-xs mobile-menu-container mobile-effect" itemscope itemtype="http://schema.org/SiteNavigationElement">
		<?php get_template_part( 'templates/header/mobile-menu' ); ?>
	</nav><!-- nav.mobile-menu-container -->
<?php endif; ?>

<div id="wrapper-container" <?php thim_wrapper_container_class(); ?>>

	<?php if ( ! is_page_template( 'templates/comingsoon.php' ) && apply_filters( 'thim_show_header', true ) ) : ?>
	<header id="masthead" class="site-header affix-top<?php thim_header_layout_class(); ?>">
		<?php
		if ( get_theme_mod( 'header_style' ) ) {
			get_template_part( 'templates/header/' . get_theme_mod( 'header_style' ) );
		} else {
			get_template_part( 'templates/header/header_v1' );
		}
		?>
	</header><!-- #masthead -->
	<?php endif; ?>

	<div id="main-content" <?php thim_main_content_class(); ?>>