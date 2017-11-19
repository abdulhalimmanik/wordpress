<?php get_header(); ?>
	<section id="content">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">

	                <?php if ( have_posts() ) : ?>
	                
						<h1 class="archive-title">
							<?php
							if ( is_day() ) :
								printf( __( 'Daily Archives: %s', 'twentytwelve' ), '<span>' . get_the_date() . '</span>' );
							elseif ( is_month() ) :
								printf( __( 'Monthly Archives: %s', 'twentytwelve' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'twentytwelve' ) ) . '</span>' );
							elseif ( is_year() ) :
								printf( __( 'Yearly Archives: %s', 'twentytwelve' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'twentytwelve' ) ) . '</span>' );
							else :
								_e( 'Archives', 'twentytwelve' );
							endif;
							?>
						</h1>                
	                
	                <?php get_template_part('post-excerpt'); ?>
	                
	                <?php else : ?>
	                    <h2>No post found!</h2>
	                <?php endif; ?>
	                
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</section>
<?php get_footer(); ?>