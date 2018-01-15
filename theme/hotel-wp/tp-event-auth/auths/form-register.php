<?php
/**
 * @Author: ducnvtt
 * @Date:   2016-02-19 09:11:26
 * @Last Modified by:     ducnvtt
 * @Last Modified time: 2 2016-03-02 10:53:18
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! get_option('users_can_register') ) {
	// flash message
	event_auth_add_message( 'register_completed', sprintf( '%s', esc_html__( 'User registration is currently not allowed.', 'hotel-wp' ) ) );
}

event_auth_print_notices();
?>

<?php if ( get_option('users_can_register') ) : ?>

<div class="row thim-auth-login" id="customer_login">

	<div class="col-xs-12 login-area" id="panel-login">


		<h4 class="thim-title"><?php esc_html_e( 'Register', 'hotel-wp' ); ?></h4>

		<form name="event_auth_register_form" action="" method="post" class="event-auth-form">

			<p class="form-row form-required">
				<label for="user_login"><?php esc_html_e( 'Username', 'hotel-wp' ) ?><span class="required">*</span><br /></label>
				<input type="text" name="user_login" id="user_login" class="input" value="<?php echo esc_attr( ! empty( $_POST['user_login'] ) ? sanitize_text_field( $_POST['user_login'] ) : '' ); ?>" size="20" />
			</p>

			<p class="form-row form-required">
				<label for="user_email"><?php esc_html_e( 'Email', 'hotel-wp' ) ?><span class="required">*</span><br /></label>
				<input type="email" name="user_email" id="user_email" class="input" value="<?php echo esc_attr( ! empty( $_POST['user_email'] ) ? sanitize_text_field( $_POST['user_email'] ) : '' ); ?>" size="25" />
			</p>

			<p class="form-row form-required">
				<label for="user_pass"><?php esc_html_e( 'Password', 'hotel-wp' ) ?><span class="required">*</span><br /></label>
				<input type="password" name="user_pass" id="user_pass" class="input" value="" size="25" />
			</p>

			<p class="form-row form-required">
				<label for="confirm_password"><?php esc_html_e( 'Confirm Password', 'hotel-wp' ) ?><span class="required">*</span><br /></label>
				<input type="password" name="confirm_password" id="confirm_password" class="input" value="" size="25" /></label>
			</p>

			<?php do_action( 'event_auth_register_form' ); ?>

			<?php $send_notify = event_get_option( 'register_notify', true ); ?>
			<?php if ( $send_notify ) : ?>
				<p id="reg_passmail">
					<?php esc_html_e( 'Registration confirmation will be emailed to you.', 'hotel-wp' ); ?>
				</p>
			<?php endif; ?>

			<br class="clear" />

			<p class="register-submit">
				<input type="hidden" name="redirect_to" value="<?php echo esc_attr( ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ); ?>" />
				<?php wp_nonce_field( 'auth-reigter-nonce', 'auth-nonce' ); ?>
				<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="<?php esc_attr_e( 'Register', 'hotel-wp' ); ?>" />
			</p>

		</form>

		<p class="text-center">
			<a href="<?php echo esc_url( event_auth_login_url() ); ?>"><?php esc_html_e( 'Log in', 'hotel-wp' ); ?></a> |
			<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" title="<?php esc_attr_e( 'Password Lost and Found', 'hotel-wp' ) ?>"><?php esc_html_e( 'Lost your password?', 'hotel-wp' ); ?></a>
		</p>

	</div>

</div>


<?php endif; ?>


