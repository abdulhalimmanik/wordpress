<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */
?>

<?php if ( have_posts() ) :?>
	<div class="row">
		<div class="blog-content masonry_layout">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				get_template_part( 'templates/template-parts/content' );
			endwhile;
			?>
		</div><!-- .blog-content.blog-list -->
	</div><!-- .row -->
<?php
	thim_paging_nav();
else :
	get_template_part( 'templates/template-parts/content', 'none' );
endif;
