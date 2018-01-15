<?php
/**
 * Template part for displaying single.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="content-inner">
		<div class="entry-top">
			<?php if ( get_theme_mod( 'blog_single_feature_image', true ) ) :
				do_action( 'thim_entry_top', 'full' );
			endif; ?>
		</div><!-- .entry-top -->
		<div class="entry-content">
			<header class="entry-header">
				<?php
				if ( is_single() ) {
					the_title( '<h3 class="entry-title">', '</h3>' );
				} else {
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}
				?>
			</header><!-- .entry-header -->

			<?php thim_entry_meta(); ?>

			<div class="entry-description">
				<?php
				if ( has_post_format( 'chat' ) ) {
					thim_get_list_group_chat();
				}
				// Get post content
				the_content();

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hotel-wp' ),
						'after'  => '</div>',
					)
				);
				?>
			</div>
		</div><!-- .entry-content -->

		<div class="entry-tag-share">
			<?php do_action( 'thim_social_share' ); ?>
			<?php
			if ( get_theme_mod( 'show_tags_meta_tags', true ) ) {
				thim_entry_meta_tags();
			}
			?>
		</div>

	</div><!-- .content-inner -->

	<?php do_action( 'thim_about_author' ); ?>

	<?php if ( get_theme_mod( 'blog_single_related_post', true ) ) :
		get_template_part( 'templates/template-parts/related-posts' );
	endif; ?>
</article><!-- #post-## -->