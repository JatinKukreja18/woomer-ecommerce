<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

<div class="" id="customer_login">

	<div class="">

<?php endif; ?>
	<div class="wm-modal wm-login-modal" id="login-modal">
		<div class="wm-modal-backdrop "></div>
		<a  class="modal-close wm-modal-close"></a>
		<div class="wm-width-wrapper wts-wrapper">
			<div class="row" style="height:100%">
			<div class=" modal-body col-md-10 offset-md-1 col-lg-8 offset-lg-2" style="margin:auto">

<div class="wm-login-container">
	<div class="wm-login-image">
	
	</div>
	<div class="wm-login-form">
<form class="woocommerce-form woocommerce-form-login login" method="post">
	<h1><?php esc_html_e( 'Sign-in to your account', 'woocommerce' ); ?></h1>

	<?php do_action( 'woocommerce_login_form_start' ); ?>

	<p class="wm-input-group woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<label for="username"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?></label>
		<input type="text" class=" wm-input woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
	</p>
	<p class="wm-input-group woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?></label>
		<input class="wm-input woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
	</p>

	<?php do_action( 'woocommerce_login_form' ); ?>

	<p class="woocommerce-LostPassword lost_password wm-sub-text ">
		<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>">
			<?php esc_html_e( 'Click here', 'woocommerce' ); ?></a>
			if you forgot your password
	</p>
	<label for="rememberme" class=" wm-input-label md-checkbox wm-input-checkbox woocommerce-form__label woocommerce-form__label-for-checkbox inline">
		<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> 
		<label></label>
		<span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
	</label>
	<p class="form-row noMargin">
		<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
		<button type="submit" class=" wm-btn wm-btn-no-mar  woocommerce-Button button" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
		
	</p>

	<?php do_action( 'woocommerce_login_form_end' ); ?>

</form>
</div>
</div>
			</div>
		</div>
	</div>
	<!-- <div class="wm-login-modal">
		<a href="" class="wm-modal-close"></a>
		
	</div> -->
<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

	</div>

	<div class="col-md-6 offset-md-3">

		<h1><?php esc_html_e( 'Create an account with Woomer', 'woocommerce' ); ?></h1>
		
			
				<form method="post" class=" woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

					<?php do_action( 'woocommerce_register_form_start' ); ?>

					<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

						<p class="wm-input-group woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
							<label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?></label>
							<input type="text" class="wm-input woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
						</p>

					<?php endif; ?>
					<div class="woomer-input-group">
					<p class="wm-input-group woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?></label>
						<input type="email" class="wm-input woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
					</p>

					<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

						<p class="wm-input-group woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
							<label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?></label>
							<input type="password" class="wm-input woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
						</p>
						</div>
					<?php endif; ?>

					<?php do_action( 'woocommerce_register_form' ); ?>

					<p class="wm-input-group woocommerce-FormRow form-row">
						<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
						<button type="submit" class="woocommerce-Button button" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
					</p>

					<?php do_action( 'woocommerce_register_form_end' ); ?>

				</form>
				<a class="modal-link" data-target="#login-modal">login</a>
		</div>

	</div>

</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
