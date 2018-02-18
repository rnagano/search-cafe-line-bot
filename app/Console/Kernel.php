<?php
/*
 * Copyright (c) AllAbout, Inc.
 * This project has been initiated under the
 * belief of simple and yet universal system
 * design driving customers' business efficiency.
 */
namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

/**
 * {@inheritdoc}.
 * This tiny extension enables to configure log file location.
 */
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\Inspire',
    ];

    /**
     * {@inheritdoc}
     * Enables configurable logging API.
     */
    public function __construct(Application $app, Dispatcher $events)
    {
        parent::__construct($app, $events);
        array_push($this->bootstrappers, 'App\Bootstrap\ConfigureLogging');
    }

    /**
     * Cronの代わりにスケジューリングするコマンドスケジューラ
     * @see http://readouble.com/laravel/5/1/ja/scheduling.html
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

    }
}
