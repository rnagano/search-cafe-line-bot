<?php
/*
 * Copyright (c) AllAbout, Inc.
 * This project has been initiated under the
 * belief of simple and yet universal system
 * design driving customers' business efficiency.
 */
namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * [Laravel default implementation]
 * Provides accessibility for Event service.
 */
class EventServiceProvider extends ServiceProvider
{
	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		'event.name' => [
			'EventListener',
		],
	];

	/**
	 * Register any other events for your application.
	 *
	 * @param  Dispatcher $events
	 * @return void
	 */
	public function boot(DispatcherContract $events)
	{
		parent::boot($events);
		//
	}
}
