<?php
/**
 * Login Form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php wc_print_notices();  ?>

<?php do_action('woocommerce_before_customer_login_form'); ?>

<div class="row" id="customer_login">

	<div class="small-12 medium-6 columns">


		<h2><?php _e( 'Registered Customers',THB_THEME_NAME ); ?></h2>
		<form method="post" class="login row">
			<div class="small-12 medium-8 columns">
				<label for="username"><?php _e( 'Username or email',THB_THEME_NAME ); ?> <span class="required">*</span></label>
				<input type="text" class="input-text full" name="username" id="username" />
			</div>
			<div class="small-12 medium-8 columns">
				<label for="password"><?php _e( 'Password',THB_THEME_NAME ); ?> <span class="required">*</span></label>
				<input class="input-text full" type="password" name="password" id="password" />
			</div>
			<div class="small-12 medium-8 columns">
			
				<input name="rememberme" type="checkbox" id="rememberme" value="forever" class="custom_check"/> <label for="rememberme" class="checkbox custom_label"><?php _e( 'Remember me',THB_THEME_NAME ); ?>
			</label>
			</div>
			<div class="small-12 columns">
				<?php wp_nonce_field( 'woocommerce-login' ); ?>
				<input type="submit" class="button" name="login" value="<?php _e( 'Login',THB_THEME_NAME ); ?>" />
				<a class="lost_password" href="<?php echo esc_url( wc_lostpassword_url() ); ?>"><?php _e( 'Lost Password?',THB_THEME_NAME ); ?></a>
			</div>
		</form>



	</div>
<?php if (get_option('woocommerce_enable_myaccount_registration')=='yes') : ?>
	<div class="small-12 medium-6 columns">

		<h2><?php _e( 'Register',THB_THEME_NAME ); ?></h2>

		<form method="post" class="register row">
			<?php do_action( 'woocommerce_register_form_start' ); ?>
			<?php if ( get_option( 'woocommerce_registration_email_for_username' ) == 'no' ) : ?>
				<div class="small-12 medium-8 columns">
					<label for="reg_username"><?php _e( 'Username',THB_THEME_NAME ); ?> <span class="required">*</span></label>
					<input type="text" class="input-text full" name="username" id="reg_username" value="<?php if (isset($_POST['username'])) echo esc_attr($_POST['username']); ?>" />
				</div>

			<?php else : endif; ?>
			<div class="small-12 medium-8 columns">
				<label for="reg_email"><?php _e( 'Email',THB_THEME_NAME ); ?> <span class="required">*</span></label>
				<input type="email" class="input-text full" name="email" id="reg_email" value="<?php if (isset($_POST['email'])) echo esc_attr($_POST['email']); ?>" />
			</div>

			<div class="small-12 medium-8 columns">
				<label for="reg_password"><?php _e( 'Password',THB_THEME_NAME ); ?> <span class="required">*</span></label>
				<input type="password" class="input-text full" name="password" id="reg_password" value="<?php if (isset($_POST['password'])) echo esc_attr($_POST['password']); ?>" />
			</div>

			<!-- Spam Trap -->
			<div style="left:-999em; position:absolute;"><label for="trap"><?php _e( 'Anti-spam',THB_THEME_NAME ); ?>/label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>
			
			<?php do_action( 'woocommerce_register_form' ); ?>
			<?php do_action( 'register_form' ); ?>

			<div class="small-12 columns">
				<?php wp_nonce_field( 'woocommerce-register', 'register' ); ?>
				<input type="submit" class="button" name="register" value="<?php _e( 'Register',THB_THEME_NAME ); ?>" />
			</div>
			<?php do_action( 'woocommerce_register_form_end' ); ?>
		</form>

	</div>
<?php endif; ?>
</div>


<?php do_action('woocommerce_after_customer_login_form'); ?>