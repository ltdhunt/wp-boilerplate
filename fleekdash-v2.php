<?php
/**
 * Plugin Name: FleekDash V2
 * Description: An even more powerful and fast dashboard experience.
 * Author: LTDHunt
 * Author URI: https://ltdhunt.com
 * License: GPLv2
 * Version: 2.0.0
 * Text Domain: fleekdash-v2
 * Domain Path: /languages
 *
 * @package FleekDash V2
 */

use FleekDashV2\Core\Install;

defined( 'ABSPATH' ) || exit;

require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';
require_once plugin_dir_path( __FILE__ ) . 'plugin.php';

/**
 * Initializes the FleekDashV2 plugin when plugins are loaded.
 *
 * @since 1.0.0
 * @return void
 */
function fleekdash_init() {
	FleekDashV2::get_instance()->init();
}

// Hook for plugin initialization.
add_action( 'plugins_loaded', 'fleekdash_init' );

// Hook for plugin activation.
register_activation_hook( __FILE__, array( Install::get_instance(), 'init' ) );
