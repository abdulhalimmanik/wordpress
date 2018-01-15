<?php
/**
 * Header Main Menu Template
 *
 */
?>

<?php if ( class_exists( 'Thim_Mega_Menu' ) && Thim_Mega_Menu::menu_is_enabled( 'primary' ) ) : ?>
	<div class="mega-menu-wrapper">
		<?php
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'container'      => false,
			'items_wrap'     => '%3$s',
			'fallback_cb'    => 'thim_main_menu_fallback',
		) );

		//  right menu sidebar
		if ( is_active_sidebar( 'right_menu' ) ) {
			echo '<div class="menu-right">';
				dynamic_sidebar( 'right_menu' );
			echo '</div>';
		}
		?>
	</div><!-- .mega-menu-wrapper -->
<?php else: ?>
	<ul id="primary-menu" class="navbar">
		<?php
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'container'      => false,
			'items_wrap'     => '%3$s',
			'fallback_cb'    => 'thim_main_menu_fallback',
		) );

		//  right menu sidebar
		if ( is_active_sidebar( 'right_menu' ) ) {
			echo '<li class="menu-right">';
				dynamic_sidebar( 'right_menu' );
			echo '</li>';
		}
		?>
	</ul><!-- #primary-menu -->
<?php endif; ?>