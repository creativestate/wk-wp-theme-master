<?php

class OpenID_Connect_Generic_Login_Form {

	private $settings;
	private $client_wrapper;

	/**
	 * @param $settings
	 * @param $client_wrapper
	 */
	function __construct( $settings, $client_wrapper ){
		$this->settings = $settings;
		$this->client_wrapper = $client_wrapper;
	}

	/**
	 * @param $settings
	 * @param $client_wrapper
	 *
	 * @return \OpenID_Connect_Generic_Login_Form
	 */
	static public function register( $settings, $client_wrapper ){
		$login_form = new self( $settings, $client_wrapper );
		
		// alter the login form as dictated by settings
		add_filter( 'login_message', array( $login_form, 'handle_login_page' ), 99 );
		
		// add a shortcode for the login button
		add_shortcode( 'openid_connect_generic_login_button', array( $login_form, 'make_login_button' ) );

		return $login_form;
	}
	
	/**
	 * Implements filter login_message
	 *
	 * @param $message
	 * @return string
	 */
	function handle_login_page( $message ) {
		$settings = $this->settings;

		// errors and auto login can't happen at the same time
		if ( isset( $_GET['login-error'] ) ) {
			$message = $this->make_error_output( $_GET['login-error'], $_GET['message'] );
		}
		else if ( $settings->login_type == 'auto' ) {
			wp_redirect( $this->client_wrapper->get_authentication_url() );
			exit;
		}
		
		// login button is appended to existing messages in case of error
		if ( $settings->login_type == 'button' ) {
			$message .= $this->make_login_button();
		}

		return $message;
	}
	
	/**
	 * Display an error message to the user
	 *
	 * @param $error_code
	 *
	 * @return string
	 */
	function make_error_output( $error_code, $error_message ) {

		ob_start();
		?>
		<div id="login_error">
			<strong><?php _e( 'ERROR'); ?>: </strong>
			<?php print $error_message; ?>
		</div>
		<?php
		return ob_get_clean();
	}

	/**
	 * Create a login button (link)
	 *
	 * @return string
	 */
	function make_login_button() {
		$text = apply_filters( 'openid-connect-generic-login-button-text', __( 'Login with your<br/>Wolters Kluwer Credentials' ) );
		$href = $this->client_wrapper->get_authentication_url();

		// record the URL of this page if set to redirect back to origin page
		if( $this->settings->redirect_user_back ) {
			$redirect_expiry = time() + DAY_IN_SECONDS;
			if ( $GLOBALS['pagenow'] == 'wp-login.php' ) {
				if( isset( $_REQUEST['redirect_to'] ) )
					$redirect_url = esc_url( $_REQUEST['redirect_to'] );
				else
					$redirect_url = admin_url();
			} else {
				$redirect_url = home_url( esc_url( add_query_arg( NULL, NULL ) ) );
			}
			setcookie( $this->client_wrapper->cookie_redirect_key, $redirect_url, $redirect_expiry, COOKIEPATH, COOKIE_DOMAIN, is_ssl() );
		}
		
		ob_start();
		?>
		<div class="openid-connect-login-button" style="margin: 1em 0 5em 0; text-align: center;background: #fff;box-shadow: 0 1px 3px rgba(0,0,0,.13); padding: 25px;">
			<p style="font-weight:700;color:#777;font-size:15px;">
				Welcome to the Global Platform Organization.
				<br/><br/>
			</p>
			<a tabIndex="1" id="Connect" class="button button-primary button-large" href="<?php print esc_url( $href ); ?>" style="display: inline-block;margin: 0 auto;padding: 10px 15px;max-width:300px;height: auto;float: none;background: rgb(133,188,32);border:1px solid #74a023;font-size: 20px;box-shadow: none;text-shadow: none;"><?php print $text; ?></a>
			<p style="color:#777;font-size:12px;">
				<br/>If you have trouble logging in please send an email to the <a href="mailto:GPOComms@wolterskluwer.com">GPO Communications team</a>.
			</p>
		</div>
		<style>
			#login { width: 400px; max-width: calc(100% - 20px); }
			.login form,
			.login #nav { opacity: 0; }
			.login form:active,
			.login form:focus,
			.login form:hover,
			.login #nav:active,
			.login #nav:focus,
			.login #nav:hover {
				opacity: 1;
			}
		</style>
		<script>
			var ConnectFocus = function(){ document.getElementById('Connect').focus(); };
			
			ConnectFocus();
			document.body.onload = ConnectFocus;
			setTimeout(ConnectFocus, 1000);
		</script>
		<?php
		return ob_get_clean();
	}
}