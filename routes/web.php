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

//Vendor Routes
Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['auth']
], function () {
    Route::resource('products', 'ProductsController');
});

//Admin Routes
Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['admin', 'auth']
], function () {
    Route::get('admins', 'UsersController@admins')->name('admins');
    Route::get('users/{id}/products', 'UsersController@products')->name('users.products');
    Route::resource('users', 'UsersController');
    Route::resource('pages', 'PagesController');
});


//Frontend Routes
Route::get('/', 'PageController@index')->name('home');
Route::get('/{url}/page', 'PageController@page')->name('page');
Route::any('{name}-{id}', ['as' => 'product.show', 'uses' => 'PageController@product'])
    ->where('name', '^([^\/]+)')
    ->where('id', '([0-9]+)$');
Route::get('browse', 'PageController@browse')->name('browse');

Route::post('/review', 'Admin\ReviewsController@store')->name('review.store');
//Auth Routes
Auth::routes();

//Dashboard Route
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'Controller@index')->name('dashboard');
});

Route::post('/upload-images', 'ImagesController@upload')->name('images.upload');
Route::resource('images', 'ImagesController');
