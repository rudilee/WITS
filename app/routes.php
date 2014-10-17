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

Route::get('/api/user', function() {
    return Response::json(array(
        'username' => 'hehehe'
    ), 401);
});

Route::post('/api/user', function() {
    return Response::json(array(
        'username' => 'umbrus',
        'message' => 'Username atau Password anda salah.'
    ), 200);
});

Route::delete('/api/user', function() {
    return Response::json(array(
        'hehehe' => 'hihihi'
    ), 200);
});

Route::post('/api/search', function() {
    return Response::json(array(
        'result' => array(
            'Hasil pertama',
            'Cuman ngetest doank',
            'Yah gitu deh hahaha',
            'Mleketek jum jum wau wau',
            'Ini hasil pencarian yg ke-5'
        ),
        'query' => strip_tags(Input::get('query'))
    ), 200);
});