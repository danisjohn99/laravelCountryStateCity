<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('api/dependent-dropdown','APIController@index');
Route::get('api/get-state-list','APIController@getStateList');
Route::get('api/get-city-list','APIController@getCityList');