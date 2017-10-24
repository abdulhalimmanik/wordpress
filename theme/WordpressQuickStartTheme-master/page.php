<?php get_header(); if(have_posts()) : while(have_posts())  : the_post(); 
    $page_meta = get_post_meta($post->ID, 'ppm_quickstart_page_options', true);
    if($page_meta['enable_sidebar'] == true) {
        $page_width = 'col-md-8';
    } else {
        $page_width = 'col-md-12';
    }
?> 


<?php if($page_meta['type'] == 'home') : ?>
<!-- Homepage content start -->



<!-- Homepage content end -->
<?php else : ?>
    <div class="internal-content-area">
        <div class="container">
            <div class="row">
                <?php if($page_meta['enable_sidebar'] == true && $page_meta['sidebar_position'] == 'left') : ?>
                <div class="col-md-4">
                    <?php dynamic_sidebar('right_sidebar'); ?>
                </div>
                <?php endif; ?>
                               
                <div class="<?php echo $page_width; ?>">
                    <div class="internal-content-wrap">
                       <h2 class="internal-page-title"><?php the_title(); ?></h2>
                       <?php the_content(); ?>
                    </div>
                </div>
                
                <?php if($page_meta['enable_sidebar'] == true && $page_meta['sidebar_position'] == 'right') : ?>
                <div class="col-md-4">
                    <?php dynamic_sidebar('right_sidebar'); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php endwhile; endif; get_footer(); ?>