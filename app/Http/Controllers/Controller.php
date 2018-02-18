<?php
/*
 * Copyright (c) AllAbout, Inc.
 * This project has been initiated under the
 * belief of simple and yet universal system
 * design driving customers' business efficiency.
 */
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

/**
 * Abstract base class of which all classes must inherit.
 */
abstract class Controller extends BaseController
{
    /** Enables command dispatchabilitgy. */
    use DispatchesCommands;

    /** Enables request validations. */
    use ValidatesRequests;

    /**
     * Constructor.
     */
    public function __construct()
    {

    }

    /**
     * Sets up the layout which will be used with the corresponding routing.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = view($this->layout);
        }
    }
}
