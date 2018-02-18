<?php
/*
 * Copyright (c) AllAbout, Inc.
 * This project has been initiated under the
 * belief of simple and yet universal system
 * design driving customers' business efficiency.
 */
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * [Illuminate default implemntation]
 * Represents PUSH request bindings.
 *
 * @author N/A
 */
abstract class Request extends FormRequest {
	// If you want to handle PUSH request, extends this
    // class and implement bindings here.
}
