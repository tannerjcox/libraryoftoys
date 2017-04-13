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

Route::get('/', 'PageController@index')->name('home');
Route::get('/{url}/page', 'PageController@page')->name('page');

Auth::routes();


Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {

    Route::get('/', 'HomeController@index')->name('dashboard');

    Route::group(['middleware' => 'admin'], function () {
        Route::get('admins', 'UsersController@admins')->name('admins');
        Route::resource('users', 'UsersController');
        Route::resource('pages', 'PagesController');
    });

});