<?php
/**
 * Header Mobile Menu Template
 *
 */
?>

<div class="menu-mobile-effect navbar-toggle" data-effect="mobile-effect">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</div><!-- .menu-mobile-effect -->

<ul class="nav navbar-nav">
	<?php
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

	//  right menu sidebar
	if (is_active_sidebar('right_menu')) {
		echo '<li class="menu-right">';
		dynamic_sidebar('right_menu');
		echo '</li>';
	}
	?>
</ul><!-- .nav -->