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
Auth::routes();

Route::prefix('jobs')->group(function(){
	Route::get('create', 'TaskController@create');
	Route::post('create', 'TaskController@store')->name('jobs.store');
});

Route::get('/user', 'TaskController@index');

