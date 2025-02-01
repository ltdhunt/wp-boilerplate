<?php
/**
 * FleekDashV2 Routes
 *
 * Defines and registers custom API routes for the FleekDashV2 using the Haruncpi\WpApi library.
 *
 * @package FleekDashV2\Routes
 */

namespace FleekDashV2\Routes;

use FleekDashV2\Libs\API\Route;

Route::prefix(
	FDV2_ROUTE_PREFIX,
	function ( Route $route ) {

		// Define accounts API routes.

		$route->post( '/accounts/create', '\FleekDashV2\Controllers\Accounts\Actions@create' );
		$route->get( '/accounts/get', '\FleekDashV2\Controllers\Accounts\Actions@get' );
		$route->post( '/accounts/delete', '\FleekDashV2\Controllers\Accounts\Actions@delete' );
		$route->post( '/accounts/update', '\FleekDashV2\Controllers\Accounts\Actions@update' );

		// Posts routes.
		$route->get( '/posts/get', '\FleekDashV2\Controllers\Posts\Actions@get_all_posts' );
		$route->get( '/posts/get/{id}', '\FleekDashV2\Controllers\Posts\Actions@get_post' );
		// Allow hooks to add more custom API routes.
		do_action( 'fdv2_api', $route );
	}
);
