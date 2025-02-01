<?php

namespace FleekDashV2\Core;

use FleekDashV2\Traits\Base;
use FleekDashV2\Libs\API\Config;

/**
 * Class API
 *
 * Initializes and configures the API for the FleekDashV2.
 *
 * @package FleekDashV2\Core
 */
class API {

	use Base;

	/**
	 * Initializes the API for the FleekDashV2.
	 *
	 * @return void
	 */
	public function init() {
		Config::set_route_file( FDV2_DIR . '/includes/Routes/Api.php' )
			->set_namespace( 'FleekDashV2\Api' )
			->init();
	}
}
