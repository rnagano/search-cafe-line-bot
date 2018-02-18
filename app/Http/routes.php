<?php
/*
 * Copyright (c) AllAbout, Inc.
 * This project has been initiated under the
 * belief of simple and yet universal system
 * design driving customers' business efficiency.
 */

/**
 * [Illuminate default implemntation]
 * Route singleton is responsible for handling every request URL routing.
 * Hnece, if you want to define new routing, implement here.
 *
 * @author N/A
 */
Route::get('/', 'HomeController@index');

Route::get('{image_dir}/{image_name}/{cafe_name}/{image_width}', 'ImageController@index')->where('image_width', '[0-9]+');

Route::post('searchCafe', 'SearchCafeController@index');

