<?php
/*
 * Copyright (c) AllAbout, Inc.
 * This project has been initiated under the
 * belief of simple and yet universal system
 * design driving customers' business efficiency.
 */
namespace App\Providers;

use Illuminate\Bus\Dispatcher;
use Illuminate\Support\ServiceProvider;

/**
 * [Laravel default implementation]
 * Provides accessibility for Bus service.
 */
class BusServiceProvider extends ServiceProvider
{

	/**
	 * Bootstrap any application services.
	 *
	 * @param  Dispatcher $dispatcher
	 * @return void
	 */
	public function boot(Dispatcher $dispatcher)
	{
		$dispatcher->mapUsing(function($command)
		{
			return Dispatcher::simpleMapping(
				$command, 'App\Commands', 'App\Handlers\Commands'
			);
		});
	}

	/**
	 * Register any application services.
	 */
	public function register()
	{
		//
	}

}
