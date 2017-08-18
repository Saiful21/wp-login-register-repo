<?php
/* protected */
if (!defined('ABSPATH'))
    exit;

//method
function nssTheme_ajax_loginfrom()
{
	// First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-login-nonce', 'security' );	
    // Nonce is checked, get the POST data and sign user on
    $info = array();
    $info['user_login'] = $_POST['username'];
    $info['user_password'] = $_POST['password'];
    $info['remember'] = $_POST['rememberme'];;
    $user_signon = wp_signon( $info, false );
    if ( is_wp_error($user_signon) )
	{
        echo json_encode(array('loggedin'=>false, 'message'=>__('Wrong username or password.')));
    } 
	else
	{	
        echo json_encode(array('loggedin'=>true, 'message'=>__('Login successful, redirecting...')));
    }
    die();
}