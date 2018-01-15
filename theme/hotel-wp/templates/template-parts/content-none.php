<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

?>
<section class="no-results not-found">
	<header class="page-header">
		<h3 class="page-title"><?php esc_html_e( 'Nothing Found', 'hotel-wp' ); ?></h3>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'hotel-wp' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'hotel-wp' ); ?></p>

			<div class="thim-search-box">
				<div class="form-search-wrapper">
					<div class="form-contain">
						<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<input type="search" class="search-field" autocomplete="off" placeholder="<?php echo esc_attr__( 'What are you looking for?', 'hotel-wp' ) ?>" value="<?php echo get_search_query() ?>" name="s" />
							<button type="submit"><i class="fa fa-search"></i></button>
							<input type="hidden" name="post_type" value="post" />
						</form>
					</div>
				</div>
			</div>
			<?php
		else : ?>
			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'hotel-wp' ); ?></p>
			<?php
		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
