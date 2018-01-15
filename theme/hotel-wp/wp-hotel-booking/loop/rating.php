<?php
/**
 * Product loop thumbnail
 *
 * @author  ThimPress
 * @package Tp-hotel-booking/Templates
 * @version 1.1.4
 */

if ( !defined( 'ABSPATH' ) ) {
	exit();
}

global $hb_settings;
global $hb_room;
$rating = $hb_room->average_rating();
$comment_count = $hb_room->post->comment_count;

$thim_options  = get_theme_mods();
$style_room = isset($thim_options['room_style']) ? $thim_options['room_style'] : 'style-1';
?>
<?php if ( comments_open( $hb_room->ID ) ): ?>

	<?php if ( $rating ) : ?>
		<div class="rating">
			<?php if ( $rating ): ?>
				<?php if($style_room == 'style-2'){ ?>
					<div class="comment-count">
						<?php echo $comment_count; ?> <?php echo esc_html__('Reviews','hotel-wp'); ?>
					</div>
					<div class="review-block">
						<div class="reviewnumber">(<?php echo sprintf( __( '%d/5', 'hotel-wp' ), $rating ) ?>)</div>
						<div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" class="star-rating" title="<?php echo sprintf( __( 'Rated %d out of 5', 'hotel-wp' ), $rating ) ?>">
							<span style="width:<?php echo ( $rating / 5 ) * 100; ?>%"></span>
						</div>
					</div>
				<?php } else { ?>
					<div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" class="star-rating" title="<?php echo sprintf( __( 'Rated %d out of 5', 'hotel-wp' ), $rating ) ?>">
						<span style="width:<?php echo ( $rating / 5 ) * 100; ?>%"></span>
					</div>
				<?php } ?>
			<?php endif; ?>
		</div>
	<?php endif; ?>

<?php endif; ?>