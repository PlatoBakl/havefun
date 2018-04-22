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
    return redirect()->route('admin');
});

Auth::routes();

Route::group(['prefix' => 'admin','middleware' => 'auth'],function(){
    Route::get('/main', 'HomeController@index')->name('admin');

    Route::resource('/events', 'EventController');

    Route::resource('/locations', 'LocationController');

    Route::resource('/event-types', 'EventTypeController');

    Route::resource('/users', 'UserController');
});



