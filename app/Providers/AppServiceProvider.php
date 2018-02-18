<?php
/*
 * Copyright (c) AllAbout, Inc.
 * This project has been initiated under the
 * belief of simple and yet universal system
 * design driving customers' business efficiency.
 */
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * [Laravel default implementation]
 * Provides accessibility for application specific services.
 */
class AppServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		// This method is called after all other service providers have
        // been registered.
        // Hence, the other services can be accessed.
	}

	/**
	 * Register any application services.
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
		);
	}
}
