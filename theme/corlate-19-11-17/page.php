<?php get_header(); ?>

    <section id="about-us">
        <div class="container">
			<div class="col-md-12">
				<?php if(have_posts()) : while(have_posts()) : 
					the_post();
				 ?>
				<?php endwhile; ?>
				
				<?php else: ?>
					<h2>404 not found!</h2>
				<?php endif; ?>
			</div>
		</div><!--/.container-->
    </section><!--/about-us-->
	
<?php get_footer(); ?>