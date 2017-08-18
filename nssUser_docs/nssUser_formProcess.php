<?php

/* protected */
if (!defined('ABSPATH'))
    exit;

/**
  copyRight by saiful islam
 */
function nssTheme_ajax_regfrom() 
{
    global $wpdb;
    $name = sanitize_text_field($_POST['rgName']);
    $uEmail = sanitize_email($_POST['rgEmail']);
    $fName = sanitize_text_field($_POST['rgFname']);
    $lName = sanitize_text_field($_POST['rgLname']);    
    $uPass = sanitize_text_field($_POST['rg_pass']);

    //wp user meta
    $nssUserMeta = array(
        'user_login' => $name,
        'user_email' => $uEmail,
        'first_name'=>$fName,
        'last_name'=>$lName,        
        'user_pass' => $uPass
    );
    
    //wp insert user
    $user_id = wp_insert_user($nssUserMeta);
    if($user_id)
    {
        echo esc_html__('successful, just Check this: ','nssuser-reg');
        ?>
        <a href="<?php echo wp_login_url(home_url('/login/')); ?>" title="Login"><?php echo esc_html("Login"); ?></a>
        <?php
    }
    die();
}
