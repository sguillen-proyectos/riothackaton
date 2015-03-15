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
Route::get('things/{thing_id}/history/{field_id}', ['uses' => 'ThingController@history']);



Form::macro('unixt', function($millis){
    $res = gmdate("Y-m-d\TH:i:s\Z", $millis);
    return $res;
});
