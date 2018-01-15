<?php
/**
 * @Author: ducnvtt
 * @Date:   2016-03-02 14:46:31
 * @Last Modified by:     ducnvtt
 * @Last Modified time: 2 2016-03-03 11:26:30
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

event_auth_print_notices();

?>

<div class="reset_password" id="customer_login">
	<h4 class="thim-title"><?php esc_html_e( 'Get Your Password', 'hotel-wp' ); ?></h4>

	<form name="resetpassform" action="<?php echo esc_url( network_site_url( 'wp-login.php?action=resetpass', 'login_post' ) ); ?>" method="POST" class="event-auth-form">
		<input type="hidden" name="user_login" value="<?php echo esc_attr( $atts['login'] ); ?>" />

		<div class="user-pass1-wrap">
			<p class="form-row required">
				<label for="pass1"><?php esc_html_e( 'Password', 'hotel-wp' ) ?></label>
			</p>

			<div class="wp-pwd">
            <span class="password-input-wrapper">
                <input type="password"  class="event_auth_input" name="pass1" />
            </span>
			</div>
		</div>

		<div class="user-pass2-wrap">
			<p class="form-row required">
				<label for="pass2"><?php esc_html_e( 'Confirm Password', 'hotel-wp' ) ?></label><br />
			</p>

			<div class="wp-pwd">
            <span class="password-input-wrapper">
                <input type="password" name="pass2" class="event_auth_input" />
            </span>
			</div>
		</div>

		<p class="description indicator-hint"><?php echo wp_get_password_hint(); ?></p>
		<br class="clear" />

		<?php
		/**
		 * Fires following the 'Strength indicator' meter in the user password reset form.
		 *
		 * @since 3.9.0
		 *
		 * @param WP_User $user User object of the user whose password is being reset.
		 */
		do_action( 'event_auth_resetpass_form', $atts['login'] );
		?>
		<input type="hidden" name="key" value="<?php echo esc_attr( $atts['key'] ); ?>" />
		<p class="submit form-row required">
			<input type="submit" name="submit" class="button button-primary button-large" value="<?php esc_attr_e( 'Reset Password', 'hotel-wp' ); ?>" />
		</p>
	</form>

	<p id="nav">
		<?php if ( !is_user_logged_in() ) : ?>
			<a href="<?php echo esc_url( wp_login_url() ); ?>"><?php esc_html_e( 'Log in', 'hotel-wp' ); ?></a>
		<?php endif; ?>
		<?php
		if ( get_option( 'users_can_register' ) ) :
			$registration_url = sprintf( '<a href="%s">%s</a>', esc_url( wp_registration_url() ), esc_html__( 'Register', 'hotel-wp' ) );

			/** This filter is documented in wp-includes/general-template.php */
			echo ' | ' . $registration_url;
		endif;
		?>
	</p>

</div>