<?php
/**
 * Plugin Name: Wp login Register
 * Plugin URI: #
 * Description: This plugin is uesd to create a new users to enter the wordpress dashboard. 
 * Version: 1.0.0
 * Author: saiful islam
 * Author URI: https://saiful5721.wordpress.com/about
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: nssuser-reg
 */

// if accessed directly
if (!defined('ABSPATH'))
    exit;

//define
define('NSS_UR_PLUGIN_URL', plugin_dir_url(__FILE__));

//login file
require_once 'nssUser_docs/nssUser_login_form.php';
//attached in ajax for login
add_action( 'wp_ajax_nssTheme_login_form', 'nssTheme_ajax_loginfrom' );
add_action( 'wp_ajax_nopriv_nssTheme_login_form', 'nssTheme_ajax_loginfrom' );
require_once 'nssUser_docs/nssUser_login_process.php';

//required files
require_once 'nssUser_docs/nssUser_form.php';
require_once 'nssUser_docs/nssUser_style.php';
//Attached in ajax for reg
add_action( 'wp_ajax_nssTheme_registration_form', 'nssTheme_ajax_regfrom' );
add_action( 'wp_ajax_nopriv_nssTheme_registration_form', 'nssTheme_ajax_regfrom' );
require_once 'nssUser_docs/nssUser_formProcess.php';

//login redirect
add_filter( 'login_url', 'target_login_page', 10, 3 );
function target_login_page( $login_url, $redirect, $force_reauth ) 
{
    return home_url( '/login/?redirect_to=' . $redirect );
}