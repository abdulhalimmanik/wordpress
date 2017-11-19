<?php get_header(); ?>

    <section id="blog" class="container">
        <div class="blog">
            <div class="row">
                 <div class="col-md-8">
                    <?php if(have_posts()) : ?>
                        <h2> <?php printf( __('search result for: %s', ''), get_search_query() ); ?> </h2>
                    <?php
                        get_template_part('post-excerpt');
                        else:
                    ?>
                        <h2>not content found</h2>
                    <?php endif; ?>
                </div><!--/.col-md-8-->

                <aside class="col-md-4">
                    <?php get_sidebar(); ?>
    			</aside>  
            </div><!--/.row-->
        </div>
    </section><!--/#blog-->

<?php  get_footer(); ?>    