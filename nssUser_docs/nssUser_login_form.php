<?php
/* protected */
if (!defined('ABSPATH'))
    exit;

//copyRight by saiful islam
 
//class decleartions
class nss_custom_login_form
{
	//construct
	public function __construct() 
    {
        add_shortcode('nssUser_login_form', array($this, 'nssTheme_login_form_view'));		
    }
	//method
	function nssTheme_login_form_view()
	{
		if ( ! is_user_logged_in() ) 
		{ // Display WordPress login form		
			?>
			<form id="login" action="login" method="post">
				<h1>Login</h1>
				<p class="status"></p>
				<div class="box-1">
					<label for="username"><?php _e('Username: ','nssuser-reg'); ?></label>
					<input id="username" placeholder="User Name" type="text" name="username">
				</div>
				<div class="box-2">
					<label for="password"><?php _e('Password: ','nssuser-reg'); ?> </label>
					<input id="password" placeholder="Password" type="password" name="password">
				</div>
				<div class="box-3">
				<label for="rememberme">Remember Me</label>
					<input name="rememberme" type="checkbox" id="rememberme" value="forever"/>					
				</div>
				<div class="box-4">
					<input class="submit_button" type="submit" value="Login" name="submit">			
					<?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
				</div>
			</form>
			<?php			
		} 
		else 
		{ // If logged in:
			wp_loginout( site_url('/login/') ); // Display "Log Out" link.
			echo " | ";
			wp_register('', ''); // Display "Site Admin" link.
		}		
	}	
}
new nss_custom_login_form();