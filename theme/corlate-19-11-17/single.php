<?php
/**
 * The template for displaying all single posts
 */

<?php get_header(); ?>

	<section id="blog" class="container">
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
