
<?php get_header(); ?>

    <section id="blog" class="container">
        <div class="blog">
            <div class="row">
                 <div class="col-md-8">

                    <?php if ( have_posts() ) : ?>
                
					<div class="author_photo">
					    <h2>Author Profile</h2>
					    
					    <style>
	                        .author-bio {overflow:hidden; margin: 25px 0;}
	                        .author-bio img {float:left; margin-right:30px; }
	                    </style>
					    <div class="author-bio">
					        <img src="http://placehold.it/100x100" class="alignleft" alt="">
					        <h2><?php the_author(); ?></h2>
					        <p><?php the_author_meta('description'); ?></p>
					        <a href="<?php the_author_meta('user_url'); ?>"><i class="fa fa-globe"></i> View Website</a> | 
					        <a href="mailto:<?php the_author_meta('user_email'); ?>"><i class="fa fa-globe"></i> Email author</a>

					    </div>
					</div>                
	                
	                
	                <?php get_template_part('post-excerpt'); ?>
	                
	                
	                <?php else : ?>
	                    <h2>No post found!</h2>
	                <?php endif; ?>                
				</div>
                <aside class="col-md-4">
                    <?php get_sidebar(); ?>
                </aside>
            </div><!--/.row-->
        </div>
    </section><!--/#blog-->

<?php  get_footer(); ?>    