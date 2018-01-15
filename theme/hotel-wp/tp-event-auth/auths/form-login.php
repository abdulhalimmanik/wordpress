<?php
/**
 * @Author: ducnvtt
 * @Date:   2016-02-19 09:11:33
 * @Last Modified by:   ducnvtt
 * @Last Modified time: 2016-03-09 08:43:34
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

event_auth_print_notices();

?>
<div class="row thim-auth-login" id="customer_login">

	<div class="col-xs-12 login-area" id="panel-login">


		<h4 class="thim-title"><?php esc_html_e( 'Login', 'hotel-wp' ); ?></h4>

		<form name="event_auth_login_form" action="" method="post" class="event-auth-form">

			<p class="form-row form-required">
				<label for="user_login"><?php esc_html_e( 'Username', 'hotel-wp' ) ?><span class="required">*</span><br /></label>
				<input type="text" name="user_login" id="user_login" class="input" value="<?php echo esc_attr( ! empty( $_POST['user_login'] ) ? sanitize_text_field( $_POST['user_login'] ) : '' ) ?>" size="20" /></label>
			</p>

			<p class="form-row form-required">
				<label for="user_pass"><?php esc_html_e( 'Password', 'hotel-wp' ) ?><span class="required">*</span><br /></label>
				<input type="password" name="user_pass" id="user_pass" class="input" value="" size="25" />
			</p>

			<?php do_action( 'event_auth_register_form' ); ?>

			<p class="form-required">
				<label for="rememberme" class="inline">
					<input class="input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php esc_html_e( 'Remember me', 'hotel-wp' ); ?>
				</label>
			</p>

			<p class="submit">
				<?php wp_nonce_field( 'auth-login-nonce', 'auth-nonce' ); ?>
				<input type="hidden" name="action" value="event_login_action" />
				<input type="hidden" name="redirect_to" value="<?php echo esc_attr( ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ); ?>" />
				<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="<?php esc_attr_e( 'Login', 'hotel-wp' ); ?>" />
			</p>

		</form>

		<p>
			<?php if ( get_option( 'users_can_register' ) ) : ?>
				<a href="<?php echo esc_attr( event_auth_register_url() ); ?>"><?php esc_html_e( 'Register', 'hotel-wp' ) ?></a> |
			<?php endif; ?>
			<a href="<?php echo esc_attr( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Forgot Password', 'hotel-wp' ) ?></a>
		</p>

	</div>

</div>
