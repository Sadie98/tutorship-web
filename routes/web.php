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

use App\Http\Controllers\GalaryController;
use App\Http\Controllers\ReportController;

Route::post('/get/user', 'UserController@get');
Route::post('/add/user', 'UserController@add');

Route::get('/get/cities/', 'CityController@getAll');
Route::post('/add/city', 'CityController@add');

Route::post('/get/news', 'NewsController@get');

Route::post('/get/meeting-by-id', 'MeetingController@getById');
Route::post('/get/meeting-by-mentor-id', 'MeetingController@getByMentor');
Route::post('/get/meeting-by-curator-id', 'MeetingController@getByCurator');
Route::post('/add/meeting', 'MeetingController@add');

Route::post('get/photos', 'GalaryController@get');

Route::post('add/report', 'ReportController@add');

Route::post('get/rels', 'RelsController@get');
