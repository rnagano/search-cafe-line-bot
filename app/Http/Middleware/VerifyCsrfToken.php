<?php
/*
 * Copyright (c) AllAbout, Inc.
 * This project has been initiated under the
 * belief of simple and yet universal system
 * design driving customers' business efficiency.
 */
namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

/**
 * [Illuminate default implemntation]
 * Represents CSRF token verification.
 *
 * @author N/A
 */
class VerifyCsrfToken extends BaseVerifier
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  Request $request
	 * @param  Closure $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		return parent::handle($request, $next);
	}
}
