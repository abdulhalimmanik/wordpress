<?php get_header(); if(have_posts()) : while(have_posts())  : the_post(); ?> 

    <div class="internal-content-area">
        <div class="container">
            <div class="row">
                               
                <div class="col-md-8">
                    <div class="internal-content-wrap">
                       <h2 class="internal-page-title"><?php the_title(); ?></h2>
                       <?php the_content(); ?>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <?php dynamic_sidebar('blog_sidebar'); ?>
                </div>
            </div>
        </div>
    </div>

<?php endwhile; endif; get_footer(); ?>