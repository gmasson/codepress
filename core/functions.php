<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// --------------------------------------------------------
// CSS
// -------------------------------------------------------- 
function cp_style() {
	echo '<link rel="stylesheet" type="text/css" href="' . cp_URL . 'src/css/codepress.css">';
}

// --------------------------------------------------------
// Screen Rendering
// -------------------------------------------------------- 
function cp_render_home() {
	include cp_URL . 'pages/home.php';
}

// --------------------------------------------------------
// Menus
// -------------------------------------------------------- 
function cp_menu() {
	add_menu_page( 'codepress', 'Codepress', 'manage_options', 'codepress', 'cp_render_home', cp_URL . 'src/img/icon.png' );
	#add_submenu_page( 'codepress', 'Documentação', 'Documentação', 'manage_options', 'documentation', 'cp_render_documentation' );
}

// --------------------------------------------------------
// Language suport
// --------------------------------------------------------
function cp_language_suport() {
	load_plugin_textdomain( 'codepress', false, cp_URL . 'languages' );
}
add_action( 'plugins_loaded', 'cp_language_suport' );

// --------------------------------------------------------
// PHP version warning
// -------------------------------------------------------- 
function cp_php_version() {
	echo '<div class="notice notice-error"><p>Error: ' . PHP_VERSION . '</p></div>'; 
}

// --------------------------------------------------------
// Loads the main functions of the plugin
// -------------------------------------------------------- 
function cp_load() {
	global $wpdb;

	// Update the wp_option value
	$db_version = get_option( 'cp_VERSION' );

	if ( $db_version == false) {
		// Add the version
		add_option( 'cp_VERSION', cp_VERSION );
	} elseif ( version_compare( $db_version, cp_VERSION, '!=' ) ) {
		// Update the version
		update_option( 'cp_VERSION', cp_VERSION );
	}

	/*
	// Create Database
	$wpdb->query( "
	CREATE TABLE IF NOT EXISTS database_name (
	`id` int unsigned AUTO_INCREMENT PRIMARY KEY,
	`name` text,
	`content` text
	)" );
	*/

	// Add Menu
	add_action( 'admin_menu', 'cp_menu' );

	// Add Stylesheet
	add_action( 'wp_head', 'cp_style' );

	// Add news users contacts
	add_filter( 'user_contacts', 'cp_new_user_contacts', 10, 1 );

	// PHP Version notice
	if ( version_compare( PHP_VERSION, '5.3.0', '<' ) ) {
		add_action( 'admin_notices', 'cp_php_version' );
	}
}