<?php
/*
 * Copyright (c) AllAbout, Inc.
 * This project has been initiated under the
 * belief of simple and yet universal system
 * design driving customers' business efficiency.
 */
namespace App\Http\Controllers;

/**
 * Default Home Controller.
 */
class HomeController extends Controller {
    /**
     * Constructor.
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        $data = [];

        return view('welcome');
    }
}
