<?php
/**
 * Template Name:  Coming Soon Mode
 *
 **/
get_header();
$background_images = thim_meta( 'thim_comingsoon_background_images', array( 'type'   => 'image',
                                                                            'single' => 'false',
                                                                            'size'   => 'full'
) );
?>
	<div class="comingsoon-wrapper">
		<div class="background">
			<ul class="slides">
				<?php
				if ( $background_images ) {
					foreach ( $background_images as $image ) {
						echo "<li><img alt='' src='{$image['url']}'></li>";
					}
				}
				?>
			</ul>
		</div>
		<div class="coom-inner">
			<?php do_action( 'thim_header_logo' ); ?>
			<h1 class="title"><?php echo get_the_title(); ?></h1>
			<div class="thim-countdown" data-date="<?php echo esc_attr( date( 'M d, Y h:i:s', strtotime( thim_meta( 'thim_comingsoon_date' ) ) ) ); ?>">
				<div class="count-down"></div>
			</div>
			<div class="content-text">
				<?php
				while ( have_posts() ) : the_post();
					the_content();
				endwhile;
				?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>