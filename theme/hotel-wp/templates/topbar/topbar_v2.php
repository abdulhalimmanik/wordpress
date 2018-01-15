<?php
/**
 * Topbar v2 template
 */
?>

<?php if ( is_active_sidebar( 'topbar-left' ) && is_active_sidebar( 'topbar-right' ) ) : ?>
    <div id="thim-header-topbar">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 text-left">
                    <ul class="list-inline pull-left">
                        <?php dynamic_sidebar( 'topbar-left' ); ?>
                    </ul>
                </div><!-- .col-sm-6.text-left -->
                <div class="col-sm-6">
                    <ul class="list-inline pull-right">
                        <?php dynamic_sidebar( 'topbar-right' ); ?>
                    </ul>
                </div><!-- .col-sm-6 -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- #thim-header-topbar -->
<?php endif;