<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('convert/{number}', 'ApiController@convert')->where('number', '[0-9]+');

Route::get('/all', 'ApiController@all');

Route::get('/popular', 'ApiController@popular');

