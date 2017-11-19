<?php
/**
 * The template for displaying 404 pages (not found)
 * 
 * comments
 * front-page
 * single
 * 
 * 
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section id="error" class="container text-center">
		        <h1>404, Page not found</h1>
		        <p>The Page you are looking for doesn't exist or an other error occurred.</p>
		        <a class="btn btn-primary" href="index.html">GO BACK TO THE HOMEPAGE</a>
		        <div class="page-content">

					<?php get_search_form(); ?>

				</div><!-- .page-content -->
		    </section><!--/#error-->

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();