<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #main-content div and all content after.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

?>

</div><!-- #main-content -->

<?php if ( ! is_page_template( 'templates/comingsoon.php' ) && apply_filters( 'thim_show_footer', true ) ) : ?>

	<?php if ( is_singular( 'hb_room' ) ) : ?>
		<div class="related-rooms">
			<div class="container">
				<?php do_action( 'hotel_booking_after_single_product' ); ?>
			</div>
		</div>
	<?php endif; ?>

	<footer id="colophon" class="site-footer <?php echo get_theme_mod('footer_style'); ?>">

		<?php if ( is_active_sidebar( 'footer_top' ) ): ?>
			<div class="footer-top container clearfix">
				<div class="row">
					<?php dynamic_sidebar( 'footer_top' ); ?>
				</div>
			</div>
		<?php endif; ?>

		<?php thim_footer_layout(); ?>

	</footer><!-- #colophon.site-footer -->
<?php endif; ?>

</div><!-- wrapper-container -->

<?php do_action( 'thim_space_body' ); ?>

<?php wp_footer(); ?>

</body>
</html>
