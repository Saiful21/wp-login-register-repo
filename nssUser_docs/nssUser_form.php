<?php
/* protected */
if (!defined('ABSPATH'))
    exit;

/**
  copyRight by saiful islam
 */
class nssUser_form 
{

//construct
    public function __construct() 
    {
        add_shortcode('nssUser_getForm', array($this, 'nssTheme_shortcode_view'));
    }

//method
    public function nssTheme_shortcode_view() 
    {
        if (is_user_logged_in())
        {
            $msg = 'Welcome, ';
            $user = wp_get_current_user();
            echo '<h2 class="welcome_msg">';
            echo esc_html__($msg . $user->user_nicename, 'nssuser-reg');
            echo '</h2>';
        }
        else
        {
            ob_start();
            ?>	
            <h3 class="nssTheme_header"><?php echo esc_html__('Register New Account','nssuser-reg'); ?></h3>     
            <div class="nssSumbit_view">
                
            </div>
            <form id="nssTheme_registration_form" class="nssTheme_form" action="" method="POST">
                <fieldset>
                    <p>
                        <label for="nssTheme_user_Login"><?php _e('Username: ','nssuser-reg'); ?></label>
                        <input id="uName" class="userLog" name="nssTheme_user_login" id="nssTheme_user_login" class="required" type="text"/>
                        <label class="error" for="nssTheme_user_login" id="name_error">This field is required.</label>
                    </p>
                    <p>
                        <label for="nssTheme_user_email"><?php _e('Email: ','nssuser-reg'); ?></label>
                        <input name="nssTheme_user_email" id="Uemail" class="useMail" type="email"/>
                        <label class="error" for="nssTheme_user_email" id="email_error">This field is required.</label>
                    </p>
                    <p>
                        <label for="nssTheme_user_first"><?php _e('First Name: ','nssuser-reg'); ?></label>
                        <input name="nssTheme_user_first" id="nssTheme_ufName" type="text"/>
                        <label class="error" for="nssTheme_user_first" id="user_first_error">This field is required.</label>
                    </p>
                    <p>
                        <label for="nssTheme_user_last"><?php _e('Last Name: ','nssuser-reg'); ?></label>
                        <input name="nssTheme_user_last" value="" id="nssTheme_ulName" type="text"/>
                        <label class="error" for="nssTheme_user_last" id="user_last_error">This field is required.</label>
                    </p>                   
                    <p>
                        <label for="password"><?php _e('Password: ','nssuser-reg'); ?></label>
                        <input name="nssTheme_user_pass" id="password" class="required" type="password"/>
                        <label class="error" for="nssTheme_user_pass">This field is required.</label>
                    </p>
                    <p>
                        <label for="password_again"><?php _e('Password Again: ','nssuser-reg'); ?></label>
                        <input name="nssTheme_user_pass_confirm" id="password_again" class="required" type="password"/>
                        <label class="error" for="nssTheme_user_pass_confirm" id="pass_confirm_error"></label>
                    </p>
                    <p>
                        <input type="hidden" name="nssTheme_register_nonce" value="<?php echo wp_create_nonce('nssTheme-register-nonce'); ?>"/>
                        <input class="button" id="submit_btn" type="submit" value="<?php _e('Register Your Account'); ?>"/>
                    </p>
                </fieldset>                
            </form>        
            <?php
            return ob_get_clean();
        }
    }

}//end class

//object
new nssUser_form();
           
