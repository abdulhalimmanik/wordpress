<?php
/**
 * @Author: ducnvtt
 * @Date  :   2016-03-03 10:34:45
 * @Last  Modified by:   ducnvtt
 * @Last  Modified time: 2016-03-25 17:12:38
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


$TP_Event_Authentication = new TP_Event_Authentication();

$event    = new Auth_Event( get_the_ID() );
$user_reg = $event->booked_quantity( get_current_user_id() );

?>
<h4 class="book-title"><?php esc_html_e( 'Buy Ticket', 'hotel-wp' ); ?></h4>
<div class="event_register_area">

	<form name="event_register" class="event_register" method="POST">

		<div class="info-event">
			<ul>
				<li>
					<div class="label"><?php esc_html_e( 'Total Slots', 'hotel-wp' ); ?></div>
					<div class="value"><?php echo esc_html( absint( $event->qty ) ) ?></div>
				</li>
				<li>
					<div class="label"><?php esc_html_e( 'Booked Times', 'hotel-wp' ); ?></div>
					<div class="value"><?php echo esc_html( absint( $event->booked_quantity() ) ) ?></div>
				</li>
				<li>
					<div class="label"><?php esc_html_e( 'Booked Slots', 'hotel-wp' ); ?></div>
					<div class="value"><?php echo esc_html( absint( $event->booked_quantity() ) ) ?></div>
				</li>
				<li class="event-cost">
					<div class="label"><?php esc_html_e( 'Cost', 'hotel-wp' ); ?></div>
					<div class="value"><?php printf( '%s', $event->is_free() ? esc_html__( 'Free', 'hotel-wp' ) : event_auth_format_price( $event->get_price() ) . esc_html__( '/Slot', 'hotel-wp' ) ) ?></div>
				</li>
				<li>
					<?php if ( ! $event->is_free() || event_get_option( 'email_register_times' ) === 'many' ) : ?>
						<!--allow set slot-->
						<div class="label"><?php esc_html_e( 'Quantity', 'hotel-wp' ) ?></div>
						<div class="value">
							<input type="number" name="qty" value="1" min="1" id="event_register_qty" />
						</div>

						<!--end allow set slot-->
					<?php else: ?>
						<!--disallow set slot-->
						<input type="hidden" name="qty" value="1" />
					<?php endif; ?>
				</li>
				<!--Hide payment option when cost is 0-->
				<?php if ( ! $event->is_free() ) : ?>
					<li class="event-payment">
						<div class="label"><?php esc_html_e( 'Pay with', 'hotel-wp' ); ?></div>
						<div class="envent_auth_payment_methods">
							<?php $payments = event_auth_payments(); ?>
							<?php
							$i = 0;
							foreach ( $payments as $id => $payment ) :
								?>
								<input id="payment_method_<?php echo esc_attr( $id ) ?>" type="radio" name="payment_method" value="<?php echo esc_attr( $id ) ?>"<?php echo esc_attr($i) === 0 ? ' checked' : '' ?>/>
								<label for="payment_method_<?php echo esc_attr( $id ) ?>"><?php echo esc_html( $payment->get_title() ) ?></label>
								<?php
								$i ++;
							endforeach;
							?>
						</div>
					</li>
				<?php endif; ?>
				<!--End hide payment option when cost is 0-->

			</ul>
			<div class="event_register_foot">
				<input type="hidden" name="event_id" value="<?php echo esc_attr( get_the_ID() ) ?>" />
				<input type="hidden" name="action" value="event_auth_register" />
				<?php wp_nonce_field( 'event_auth_register_nonce', 'event_auth_register_nonce' ); ?>
				<?php if ( $event->post->post_status === 'tp-event-expired' ) : ?>
					<button type="submit" disabled class="event_button_disable"><?php esc_html_e( 'Expired', 'hotel-wp' ); ?></button>
				<?php elseif ( absint( $event->qty ) == 0 ) : ?>
					<button type="submit" disabled class="event_button_disable"><?php esc_html_e( 'Sold Out', 'hotel-wp' ); ?></button>
				<?php else: ?>
					<button type="submit" class="event_register_submit event_auth_button"><?php esc_html_e( 'Book Now', 'hotel-wp' ); ?></button>
				<?php endif ?>

			</div>
		</div>

	</form>

</div>