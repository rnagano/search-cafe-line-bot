<?php
/*
 * Copyright (c) AllAbout, Inc.
 * This project has been initiated under the
 * belief of simple and yet universal system
 * design driving customers' business efficiency.
 */
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Utilities\Validation\Validator;

/**
 * Tiny enhanced Validator ServiceProvider class.
 */
class ValidationServiceProvider extends ServiceProvider
{
  /**
   * {@inheritdoc}
   * Registers Validator instance into the container.
   */
  public function boot()
  {
    $this->app['validator']->resolver(function($translator, $data, $rules, $messages) {
      return new Validator($translator, $data, $rules, $messages);
    });
  }

  /**
   * {@inheritdoc}
   * In this ServiceProvider, nothing to be done.
   */
  public function register()
  {
    // NOTHING TO BE DONE.
  }
}