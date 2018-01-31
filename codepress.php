<?php
/**
* Plugin Name: Codepress
* Plugin URI: https://github.com/gmasson/codepress
* Version: 1.0
* Author: Gabriel Masson
* Author URI: https://gmasson.github.io/
* Description: Plugin base for Wordpress plugin development
* Text Domain: codepress
* License: MIT
*/

// --------------------------------------------------------
// Exit if accessed directly
// --------------------------------------------------------
if ( ! defined( 'ABSPATH' ) ) exit;

// --------------------------------------------------------
// Plugin Information
// --------------------------------------------------------
define( 'cp_VERSION', '1.0' );

// --------------------------------------------------------
// Plugin URL
// --------------------------------------------------------
define( 'cp_URL', '../wp-content/plugins/codepress/' ); /* Why will render directly from wp-admin */

// --------------------------------------------------------
// Functions
// --------------------------------------------------------
require_once 'core/functions.php';

// --------------------------------------------------------
// Loading essential functions
// --------------------------------------------------------
cp_load();