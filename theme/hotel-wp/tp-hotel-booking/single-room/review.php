<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!
 *
 * @author        ThimPress
 * @package       tp-hotel-booking/templates
 * @version       1.1.4
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( !class_exists( 'HB_Settings' ) )
	return;

$rating   = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) );
$settings = HB_Settings::instance();
?>
<li itemprop="review" itemscope itemtype="http://schema.org/Review" <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

    <div id="comment-<?php comment_ID(); ?>" class="comment_container">

		<?php echo get_avatar( $comment, apply_filters( 'hb_review_gravatar_size', '70' ), '' ); ?>

        <div class="comment-text">


			<?php if ( $comment->comment_approved == '0' ) : ?>

                <p class="meta"><em><?php esc_html_e( 'Your comment is awaiting approval', 'hotel-wp' ); ?></em></p>

			<?php else : ?>

                <p class="meta">
                    <strong itemprop="author" class="author"><?php comment_author(); ?></strong>
					<?php if ( $rating && $settings->get( 'enable_review_rating' ) ) : ?>
                        <span itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" class="star-rating" title="<?php echo sprintf( esc_html__( 'Rated %d out of 5', 'hotel-wp' ), $rating ) ?>">
						<span style="width:<?php echo ( $rating / 5 ) * 100; ?>%"></span>
					</span>
					<?php endif; ?>
                </p>
			<?php endif; ?>

            <div itemprop="description" class="description"><?php comment_text(); ?></div>
        </div>
    </div>