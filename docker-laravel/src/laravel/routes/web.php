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

// Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/timeline', 'Auth\TimelineController@showTimelinePage')->name('timeline');
Route::post('/timeline', 'Auth\TimelineController@postTweet');
Route::post('/timeline/{id}', 'Auth\TimelineController@delete')->name('timeline.delete');