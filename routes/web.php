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

//Admin Routes
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['admin', 'auth']], function () {
    Route::get('admins', 'UsersController@admins')->name('admins');
    Route::resource('users', 'UsersController');
    Route::resource('pages', 'PagesController');
    Route::resource('products', 'ProductsController');
});


//Frontend Routes
Route::get('/', 'PageController@index')->name('home');
Route::get('/{url}/page', 'PageController@page')->name('page');
Route::any('{name}-{id}', ['as' => 'product.show','uses' => 'PageController@product'])
    ->where('name', '^([^\/]+)')
    ->where('id', '([0-9]+)$');
Route::get('browse', 'PageController@browse')->name('browse');

//Auth Routes
Auth::routes();

//Dashboard Route
Route::group([ 'middleware' => 'auth'], function () {
    Route::get('/dashboard', 'Controller@index')->name('dashboard');
});

//Vendor Routes
//Route::group(['namespace' => 'Vendor', 'middleware' => 'auth'], function () {
//    Route::get('/', 'HomeController@index')->name('dashboard');
//});
