<?php
/*
 * Copyright (c) AllAbout, Inc.
 * This project has been initiated under the
 * belief of simple and yet universal system
 * design driving customers' business efficiency.
 */
namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

/**
 * [Laravel default implementation]
 * Provides accessibility for Route service.
 */
class RouteServiceProvider extends ServiceProvider
{
	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * @var string
	 */
	protected $namespace = 'App\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  Router $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		parent::boot($router);
		//
	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  Router $router
	 * @return void
	 */
	public function map(Router $router)
	{
		$router->group(['namespace' => $this->namespace], function($router)
		{
			require app_path('Http/routes.php');
		});
	}
}
