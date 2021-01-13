<?php
/*
Plugin Name: backpage 
Description: backpage
Author: lin
Version: 1.0
*/
include_once($_SERVER['DOCUMENT_ROOT'].'/wp-config.php');
global $wpdb;
add_action( 'admin_menu', function() {
	add_menu_page( 'Custom search and manage', '帳號管理', 'manage_options', 'backpage', 'account_manage', 'dashicons-welcome-widgets-menus', 105 );
	global $menu;

});

function account_manage(){
    require_once "custom-manage-index.php";
}



add_action( 'admin_menu', function() {
	add_menu_page( 'moneyReport', '財務報表', 'manage_options', 'moneyReport', 'moneyReport', 'dashicons-welcome-widgets-menus', 110 );
	global $menu;
});

function moneyReport(){
require_once "moneyReport.php";
}

add_action( 'admin_menu', function() {
	add_menu_page( 'GAMEReport', '遊戲報表', 'manage_options', 'GAMEReport', 'GAMEReport', 'dashicons-welcome-widgets-menus', 115 );
	global $menu;
});

function GAMEReport(){
require_once "GAMEReport.php";
}



	
add_action( 'admin_menu', function() {
	add_menu_page( 'Profiteport', '總報表', 'manage_options', 'Profiteport', 'Profiteport', 'dashicons-welcome-widgets-menus', 104 );
	global $menu;
});

function Profiteport(){
require_once "Profiteport.php";
}

add_action( 'admin_menu', function() {
	add_menu_page( 'proxyreport', '代理會員報表', 'manage_options', 'proxyreport', 'proxyreport', 'dashicons-welcome-widgets-menus', 125 );
	global $menu;
});

function proxyreport(){
require_once "proxyreport.php";
}


add_action( 'admin_menu', function() {
	add_menu_page( 'flowreport', '金流報表', 'manage_options', 'flowreport', 'flowreport', 'dashicons-welcome-widgets-menus', 130 );
	global $menu;
});

function flowreport(){
require_once "flowreport.php";
}



?>


