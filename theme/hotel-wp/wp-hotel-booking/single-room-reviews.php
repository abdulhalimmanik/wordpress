<?php
/**
 * Display single product reviews (comments)
 *
 * @author        ThimPress
 * @package       tp-hotel-booking/templates
 * @version       2.3.2
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


global $hb_room;
global $hb_settings;

if ( ! comments_open() ) {
	return;
}
?>
<div id="reviews">
	<div id="comments">
		<h3 class="heading-title"><?php esc_html_e( 'Reviews', 'hotel-wp' ); ?></h3>

		<?php if ( have_comments() ) : ?>

			<ol class="commentlist">
				<?php wp_list_comments( apply_filters( 'hb_room_review_list_args', array( 'callback' => 'hb_comments' ) ) ); ?>
			</ol>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="hb-pagination">';
				paginate_comments_links( apply_filters( 'hb_comment_pagination_args', array(
					'prev_text' => '&larr;',
					'next_text' => '&rarr;',
					'type'      => 'list',
				) ) );
				echo '</nav>';
			endif; ?>

		<?php else : ?>

			<p class="hb-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'hotel-wp' ); ?></p>

		<?php endif; ?>
	</div>

	<?php if ( hb_customer_booked_room( $hb_room->id ) ) : ?>

		<div id="review_form_wrapper">
			<div id="review_form">
				<?php
				$commenter    = wp_get_current_commenter();
				$comment_form = array(
					'title_reply'          => have_comments() ? esc_html__( 'Add review', 'hotel-wp' ) : esc_html__( 'Be the first to review', 'hotel-wp' ) . ' &ldquo;' . get_the_title() . '&rdquo;',
					'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'hotel-wp' ),
					'comment_notes_before' => '',
					'comment_notes_after'  => '',
					'fields'               => array(
						'author' => '<p class="comment-form-author">' . '<label for="author">' . esc_html__( 'Name', 'hotel-wp' ) . ' <span class="required">*</span></label> ' .
						            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" /></p>',
						'email'  => '<p class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'hotel-wp' ) . ' <span class="required">*</span></label> ' .
						            '<input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" aria-required="true" /></p>',
					),
					'label_submit'         => esc_html__( 'Submit', 'hotel-wp' ),
					'logged_in_as'         => '',
					'comment_field'        => ''
				);

				if ( $hb_settings->get( 'enable_review_rating' ) ) {
					$comment_form['comment_field'] = '<p class="comment-form-rating"><label>' . esc_html__( 'Your Rating', 'hotel-wp' ) . '</label>
                        </p><div class="hb-rating-input"></div>';
				}

				$comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Your Review', 'hotel-wp' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>';
				comment_form( apply_filters( 'hb_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>

	<?php else : ?>

		<p class="hb-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'hotel-wp' ); ?></p>

	<?php endif; ?>

	<div class="clear"></div>
</div>
