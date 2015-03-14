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

Route::get('/', ['uses' => 'ThingController@index']);
Route::get('things/types', ['uses' => 'ThingController@getThingTypes']);
Route::get('things/{id}', ['uses' => 'ThingController@show']);
