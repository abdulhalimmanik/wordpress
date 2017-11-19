<?php get_header(); ?>

	<section id="blog" class="container">
	    <div class="center">
	        <h2>Blogs</h2>
	        <p class="lead">Pellentesque habitant morbi tristique senectus et netus et malesuada</p>
	    </div>

	    <div class="blog">
	        <div class="row">
	             <div class="col-md-8">
	                <?php get_template_part('post-excerpt'); ?>
	            </div><!--/.col-md-8-->

	            <aside class="col-md-4">
	                <?php get_sidebar(); ?>
				</aside>  
	        </div><!--/.row-->
	    </div>
	</section><!--/#blog-->

<?php  get_footer(); ?>