<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/test', function()
{
	return View::make('home', array(
		'unfinished' => 13,
		'finished' => 2190,
		'open' => 5,
		'in_progress' => 8,
		'resolved' => 1024
	));
});

Route::get('/login', function() {
	return View::make('login');
});
