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
    return view('layouts/app');
});
Route::get('/profile', function () {
    return view('layouts/app');
});
Route::get('/meetings', function () {
    return view('layouts/app');
});

Route::get('/cities/', 'CityController@getAll');
Route::post('/city', 'CityController@add');

Route::post('/news', 'NewsController@get');
