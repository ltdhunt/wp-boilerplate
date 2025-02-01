<?php
use FleekDashV2\Core\Api;
use FleekDashV2\Admin\Menu;
use FleekDashV2\Core\Template;
use FleekDashV2\Assets\Frontend;
use FleekDashV2\Assets\Admin;
use FleekDashV2\Traits\Base;

defined( 'ABSPATH' ) || exit;

/**
 * Class FleekDashV2
 *
 * The main class for the Coldmailar plugin, responsible for initialization and setup.
 *
 * @since 1.0.0
 */
final class FleekDashV2 {

	use Base;

	/**
	 * Class constructor to set up constants for the plugin.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function __construct() {
		define( 'FDV2_VERSION', '1.0.0' );
		define( 'FDV2_PLUGIN_FILE', __FILE__ );
		define( 'FDV2_DIR', plugin_dir_path( __FILE__ ) );
		define( 'FDV2_URL', plugin_dir_url( __FILE__ ) );
		define( 'FDV2_ASSETS_URL', FDV2_URL . '/assets' );
		define( 'FDV2_ROUTE_PREFIX', 'fleekdash-v2/v1' );
	}

	/**
	 * Main execution point where the plugin will fire up.
	 *
	 * Initializes necessary components for both admin and frontend.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function init() {
		if ( is_admin() ) {
			Menu::get_instance()->init();
			Admin::get_instance()->bootstrap();
		}

		// Initialze core functionalities.
		Frontend::get_instance()->bootstrap();
		API::get_instance()->init();
		Template::get_instance()->init();

		add_action( 'init', array( $this, 'i18n' ) );
		add_action( 'init', array( $this, 'register_blocks' ) );
	}

	public function register_blocks() {
		register_block_type( __DIR__ . '/assets/blocks/block-1' );
	}


	/**
	 * Internationalization setup for language translations.
	 *
	 * Loads the plugin text domain for localization.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function i18n() {
		load_plugin_textdomain( 'fleekdash-v2', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}
}
