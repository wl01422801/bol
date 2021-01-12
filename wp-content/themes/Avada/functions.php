<?php
/**
 * Extra files & functions are hooked here.
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package Avada
 * @subpackage Core
 * @since 1.0
 */
add_action(
  'admin_menu',
  function () {
    // Remove Dashboard
    remove_menu_page( 'index.php' );
    // Remove Dashboard -> Update Core notice
    remove_submenu_page( 'index.php', 'update-core.php' );

    // Remove Media -> Add new media
    remove_submenu_page( 'upload.php', 'media-new.php' );
    // Remove Appearance -> Customize
    remove_submenu_page( 'themes.php', 'customize.php?return=' . urlencode( $_SERVER['REQUEST_URI'] ) );

    // Remove Tools -> Available Tools
    remove_submenu_page( 'tools.php', 'tools.php' );
    // Remove Tools -> Import
    remove_submenu_page( 'tools.php', 'import.php' );
    // Remove Tools -> Export
    remove_submenu_page( 'tools.php', 'export.php' );

    // Remove Settings
    // remove_menu_page( 'options-general.php' );
    // Remove Settings -> Writing
    remove_submenu_page( 'options-general.php', 'options-writing.php' );
    // Remove Settings -> Discussion
    remove_submenu_page( 'options-general.php', 'options-discussion.php' );
    // Remove Settings -> Media
    remove_submenu_page( 'options-general.php', 'options-media.php' );
  },
  999
);

add_action( 'admin_menu', 'remove_admin_menus' );
add_action( 'admin_menu', 'remove_admin_submenus' );

//Remove top level admin menus
function remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
    remove_menu_page( 'edit.php?post_type=avada_portfolio' );
    remove_menu_page( 'edit.php?post_type=avada_faq' );
    remove_menu_page( 'edit.php' );
}

//Remove sub level admin menus
function remove_admin_submenus() {
    remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' );
    remove_submenu_page( 'edit.php', 'post-new.php' );
    remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=category' );
    remove_submenu_page( 'edit.php', 'post-new.php?post_type=avada_portfolio' );
    remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=portfolio_category&post_type=avada_portfolio' );
    remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=portfolio_skills&post_type=avada_portfolio' );
    remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=portfolio_skills&post_typeportfolio_tags&post_type=avada_portfolio' );
    remove_submenu_page( 'edit.php', 'post-new.php?post_type=avada_faq' );
    remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=faq_category&post_type=avada_faq' );
    remove_submenu_page( 'tools.php', 'export-personal-data.php' );
    remove_submenu_page( 'tools.php', 'erase-personal-data.php' );
    remove_submenu_page( 'themes.php', 'themes.php?page=avada_options' );

}

// Do not allow directly accessing this file..
if ( ! defined( 'ABSPATH' ) ) {
 exit( 'Direct script access denied.' );
}

if ( ! defined( 'AVADA_VERSION' ) ) {
 define( 'AVADA_VERSION', '7.2.1' );
}

if ( ! defined( 'AVADA_MIN_PHP_VER_REQUIRED' ) ) {
 define( 'AVADA_MIN_PHP_VER_REQUIRED', '5.6' );
}

if ( ! defined( 'AVADA_MIN_WP_VER_REQUIRED' ) ) {
 define( 'AVADA_MIN_WP_VER_REQUIRED', '4.7' );
}

// Developer mode.
if ( ! defined( 'AVADA_DEV_MODE' ) ) {
 define( 'AVADA_DEV_MODE', false );
}

/**
 * Compatibility check.
 *
 * Check that the site meets the minimum requirements for the theme before proceeding.
 *
 * @since 6.0
 */
if ( version_compare( $GLOBALS['wp_version'], AVADA_MIN_WP_VER_REQUIRED, '<' ) || version_compare( PHP_VERSION, AVADA_MIN_PHP_VER_REQUIRED, '<' ) ) {
 require_once get_template_directory() . '/includes/bootstrap-compat.php';
 return;
}

/**
 * Bootstrap the theme.
 *
 * @since 6.0
 */
require_once get_template_directory() . '/includes/bootstrap.php';

/* Omit closing PHP tag to avoid "Headers already sent" issues. */

function themebs_enqueue_styles() {

wp_enqueue_style( 'bootstrap','https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css' );


}
add_action( 'wp_enqueue_scripts', 'themebs_enqueue_styles');

function themebs_enqueue_scripts() {
    //wp_enqueue_script('custom-script', 'https://code.jquery.com/jquery-2.2.4.js', array( 'jquery' ));
  wp_register_script( 'jQuery','https://code.jquery.com/jquery-3.5.1.min.js');
        wp_enqueue_script( 'jQuery' );
   wp_register_script( 'popper','https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js');
      wp_enqueue_script( 'popper' );
 

        
}
add_action( 'wp_enqueue_scripts', 'themebs_enqueue_scripts');



/* Fix for Modal Conflict */
add_action( 'wp', function() {
 Fusion_Dynamic_JS::deregister_script( 'bootstrap-modal' );
}, 99);


add_action( 'init', 'my_add_shortcodes' );

function my_add_shortcodes() {

 add_shortcode( 'my-login-form', 'my_login_form_shortcode' );
}


function my_login_form_shortcode() {

 if ( is_user_logged_in() )
  return '';

 return wp_login_form( array( 'echo' => false ) );
}





add_action( 'init', 'my_add_login_shortcodes' );

function my_add_login_shortcodes() {

 add_shortcode( 'my-login-button-form', 'my_login_button_form_shortcode' );
}


function my_login_button_form_shortcode() {
$loggouturl = "location.href='".wp_logout_url()."'";
 if ( is_user_logged_in() )
  return '<button type="button" style="background-color:red;border:0px;" class="btn btn-primary" onclick="'.$loggouturl.'">登出</button>';

 return '

 <button type="button" style="background-color:rgba(0, 0, 0, 1); border-color:white;" class="btn btn-primary" data-toggle="modal" data-target="#myModal666" onclick="loginformpop();">登入</button>';
}



add_action( 'init', 'my_add_re_shortcodes' );

function my_add_re_shortcodes() {

 add_shortcode( 'my-re-button-form', 'my_re_button_form_shortcode' );
}


function my_re_button_form_shortcode() {

 if ( is_user_logged_in() )
  return '';

 return '
 <button type="button" style="background-color:rgba(0, 0, 0, 1); border-color:white;" class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="startfirst();">註冊</button>
 ';
}


add_action( 'init', 'my_add_account_shortcodes' );

function my_add_account_shortcodes() {

 add_shortcode( 'my-account-button-form', 'my_account_button_form_shortcode' );
}


function my_account_button_form_shortcode() {

 if ( is_user_logged_in() ){
$current_user = wp_get_current_user();
  return '<div style="white-space:nowrap;width:100%;text-align:center;">
<div style="display:inline;">VIP</div>
<div id="user_name" style="display:inline;">'.$current_user->user_login.'</div>
<div style="display:inline !important;white-space:nowrap;">

<div id="dropdownMenuButton"data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false" style="display:inline;">
        <img src="https://www.ba-666.com/wp-content/uploads/2020/12/1200px-QRcode_image.svg.png" style="width:20px;height:20px;">
      </div>
   
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
        <ul class="dropdown-item">
          <li class="left_title">CQ9</li>
          <li class="right_num">0</li>
        </ul>
        <ul class="dropdown-item">
          <li class="left_title">真人體育</li>
          <li class="right_num">0</li>
        </ul>
        <ul class="dropdown-item">
          <li class="left_title">電子賽馬</li>
          <li class="right_num">0</li>
        </ul>
        <button type="button" class="btn btn-success goBack">全部轉回主帳戶</button>
      </div>
      

</div>
<div style="display:inline;"><a href="javascript:popmember(3);" style="color:white;">提</a></div>
<div style="display:inline;"><a href="javascript:popmember(2);" style="color:white;">轉</a></div>
<div style="display:inline;"><a href="javascript:popmember(1);" style="color:white;">存</a></div>


</div>';
 }else{
  return '<script>
  $(".fusion-layout-column fusion_builder_column fusion-builder-column-1 fusion-flex-column fusion-no-small-visibility fusion-no-medium-visibility").css("display","none");
  </script>
  ';
  
 }
 
}



function svd_deactivate() {
    wp_clear_scheduled_hook( 'svd_cron' );
}
 
add_action('init', function() {
    add_action( 'svd_cron', 'svd_run_cron' );
    register_deactivation_hook( __FILE__, 'svd_deactivate' );
 
    if (! wp_next_scheduled ( 'svd_cron' )) {
        wp_schedule_event( time(),'' , 'svd_cron' );
    }
});
 
function svd_run_cron() {
include_once($_SERVER['DOCUMENT_ROOT'].'/wp-config.php');
global $wpdb;
$current_user = wp_get_current_user();
$username = $current_user->user_login;
$data = [ 'user_login' => '1234' ,'amount' => '123456789','oid' => '123456789'];
$format = [ '%s','%f','%s'];
$wpdb->insert( $wpdb->prefix . 'deposit', $data, $format );
}


add_action( 'pre_get_posts', 'add_header_origin' );

function add_header_origin() {
    if (is_feed()){
        header( 'Access-Control-Allow-Origin: *' );
    }
}     

//登入後運行
add_action('wp_login','set_last_login');

//function for setting the last login
function set_last_login($login) {
	$user = get_userdatabylogin($login);
	$curent_login_time = get_user_meta(	$user->ID , 'current_login', true);
	//add or update the last login value for logged in user
	if(!empty($curent_login_time)){
		update_usermeta( $user->ID, 'last_login', $curent_login_time );
		update_usermeta( $user->ID, 'current_login', current_time('mysql') );
	}else {
		update_usermeta( $user->ID, 'current_login', current_time('mysql') );
		update_usermeta( $user->ID, 'last_login', current_time('mysql') );
	}
}
?>