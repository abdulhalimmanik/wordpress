<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link    https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 */
?>

<div class="error-404 not-found">
	<div class="page-content">
		<h2 class="page-title"><?php esc_html_e( 'Page Not Found!', 'hotel-wp' ) ?></h2>
		<p class="message top"> <?php esc_html_e( 'Sorry, We couldn\'t find the page you\'re looking for.', 'hotel-wp' ); ?></p>
		<p class="back-home"> <?php esc_html_e( 'Try returning to the ', 'hotel-wp' ); ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Homepage', 'hotel-wp' ); ?></a>
		</p>
		<img src="<?php echo get_template_directory_uri() . '/assets/images/404_img.jpg' ?>" alt="" />
	</div><!-- .page-content -->
</div><!-- .error-404 -->
