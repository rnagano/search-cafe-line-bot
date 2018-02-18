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
 * Provides accessibility for Config service.
 */
class ConfigServiceProvider extends ServiceProvider
{
	/**
	 * Overwrite any vendor / package configuration.
	 */
	public function register()
	{
		config([
			// Implement your configuration mappings here.
		]);
	}

}
