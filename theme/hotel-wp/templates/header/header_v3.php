<?php
/**
 * Header v3 template
 *
 */

$thim_options = get_theme_mods();
?>

<div class="container">
    <div class="row">
        <div class="thim-top-logo col-sm-12">
            <div class="width-logo sm-logo text-center">
                <?php do_action( 'thim_header_logo' ); ?>
                <?php do_action( 'thim_header_sticky_logo' ); ?>
            </div>
        </div><!-- .thim-top-logo -->
        
        <div class="navigation col-sm-12">
            <nav class="width-navigation main-navigation">
                <div class="inner-navigation">
                    <?php get_template_part( 'templates/header/main-menu' ); ?>
                </div><!-- .inner-navigation -->
            </nav><!-- .width-navigation -->
            <div class="menu-mobile-effect navbar-toggle" data-effect="mobile-effect">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </div><!-- .menu-mobile-effect -->
        </div><!-- .navigation -->
    </div><!-- .row -->
</div><!-- .container -->