<?php

/* protected */
if (!defined('ABSPATH'))
    exit;

/**
  copyRight by saiful islam
 */
//class define
class nssUser_style {

    //construct
    public function __construct() 
    {
        add_action('wp_enqueue_scripts', array($this, 'nss_reg_mix_added'));
        add_action('admin_menu', array($this, 'nss_reg_shortcode_view'));
    }

    //methods
    function nss_reg_shortcode_view() 
    {
        add_submenu_page('options-general.php', __('NSS Reg Shortcode', 'nssuser-reg'), 'Nss Register ShortCode', 'manage_options', 'nss-user', array($this, 'nss_shortcode_regdisp'));
        add_submenu_page('options-general.php', __('NSS Login Shortcode', 'nssuser-reg'), 'Nss Login ShortCode', 'manage_options', 'nss-user-login', array($this, 'nss_shortcode_login'));
    }
    function nss_shortcode_regdisp()
    {
        echo '<b> Just Past it in your page </b>'.'<br/>';
        echo '[nssUser_getForm]';
    }
	function nss_shortcode_login(){
		echo '<b> This is a login shortcode. Please past it in your page </b><br/>';
		echo '[nssUser_login_form]';
	}
    public function nss_reg_mix_added() 
    {
        wp_register_style('nssTheme-style', NSS_UR_PLUGIN_URL . 'nssUser_assets/css/nssTheme-style.css');
        wp_enqueue_style('nssTheme-style');

        wp_enqueue_script('jquery');

        wp_register_script('nssUser_custom', NSS_UR_PLUGIN_URL . 'nssUser_assets/js/nssUser_custom.js', array('jquery'), '', TRUE);
        wp_enqueue_script('nssUser_custom');

        wp_localize_script('nssUser_custom', 'nssUser_ajax', array('ajaxurl' => admin_url('admin-ajax.php')));
        wp_localize_script('nssUser_custom', 'nssUser_login_ajax', array('ajaxurl' => admin_url('admin-ajax.php'),'redirecturl' => site_url('/login/'),'loadingmessage' => __('Sending user info, please wait...')));
    }

}//end class

//object
new nssUser_style();