<?php

namespace FleekDashV2\Admin;

use FleekDashV2\Traits\Base;

/**
 * Class Menu
 *
 * Represents the admin menu management for the FleekDashV2 plugin.
 *
 * @package FleekDashV2\Admin
 */
class Menu {

	use Base;

	/**
	 * Parent slug for the menu.
	 *
	 * @var string
	 */
	private $parent_slug = 'fleekdash-v2';

	/**
	 * Initializes the admin menu.
	 *
	 * @return void
	 */
	public function init() {
		// Hook the function to the admin menu.
		add_action( 'admin_menu', array( $this, 'menu' ) );
	}

	/**
	 * Adds a menu to the WordPress admin dashboard.
	 *
	 * @return void
	 */
	public function menu() {

		add_menu_page(
			__( 'MyPlugin', 'fleekdash-v2' ),
			__( 'MyPlugin', 'fleekdash-v2' ),
			'manage_options',
			$this->parent_slug,
			array( $this, 'admin_page' ),
			'dashicons-email',
			3
		);

		$plugin_url = admin_url( '/admin.php?page=' . $this->parent_slug );

		$current_page = get_admin_page_parent();

		if ( $current_page === $this->parent_slug ) {
			$plugin_url = '';
		}

		$submenu_pages = array(
			array(
				'parent_slug' => $this->parent_slug,
				'page_title'  => __( 'Dashboard', 'fleekdash-v2' ),
				'menu_title'  => __( 'Dashboard', 'fleekdash-v2' ),
				'capability'  => 'manage_options',
				'menu_slug'   => $this->parent_slug,
				'function'    => array( $this, 'admin_page' ), // Uses the same callback function as parent menu.
			),
			array(
				'parent_slug' => $this->parent_slug,
				'page_title'  => __( 'Inbox', 'fleekdash-v2' ),
				'menu_title'  => __( 'Inbox', 'fleekdash-v2' ),
				'capability'  => 'manage_options',
				'menu_slug'   => $plugin_url . '/#/inbox',
				'function'    => null, // Uses the same callback function as parent menu.
			),

			array(
				'parent_slug' => $this->parent_slug,
				'page_title'  => __( 'Chart', 'fleekdash-v2' ),
				'menu_title'  => __( 'Chart', 'fleekdash-v2' ),
				'capability'  => 'manage_options',
				'menu_slug'   => $plugin_url . '/#/charts',
				'function'    => null, // Uses the same callback function as parent menu.
			),

			array(
				'parent_slug' => $this->parent_slug,
				'page_title'  => __( 'Settings', 'fleekdash-v2' ),
				'menu_title'  => __( 'Settings', 'fleekdash-v2' ),
				'capability'  => 'manage_options',
				'menu_slug'   => $plugin_url . '/#/settings',
				'function'    => null, // Uses the same callback function as parent menu.
			),
		);

		$plugin_submenu_pages = apply_filters( 'fdv2_submenu_pages', $submenu_pages );

		foreach ( $plugin_submenu_pages as $submenu ) {

			add_submenu_page(
				$submenu['parent_slug'],
				$submenu['page_title'],
				$submenu['menu_title'],
				$submenu['capability'],
				$submenu['menu_slug'],
				$submenu['function']
			);
		}
	}

	/**
	 * Callback function for the main "MyPlugin" menu page.
	 *
	 * @return void
	 */
	public function admin_page() {
		?>
		<div id="fleekdash-v2" class="fleekdash-v2-app"></div>
		<?php
	}
}
