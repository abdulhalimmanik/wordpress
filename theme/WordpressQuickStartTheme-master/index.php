<?php get_header(); ?>

<div class="internal-content-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="internal-content-wrap">
                    <?php get_template_part('post-excerpt'); ?>
                </div>
            </div>
            
            <div class="col-md-4">
                <?php dynamic_sidebar('blog_sidebar'); ?>
            </div>            
        </div>
    </div>
</div>


<?php get_footer(); ?>