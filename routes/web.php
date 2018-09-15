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

Auth::routes();

Route::get('/', 'PageController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
	/* For Product */
	Route::get('/products','ProductController@index')->name('products');
	Route::get('/products/create', 'ProductController@create')->name('product_create');
	Route::post('/products/create', 'ProductController@store');
	Route::get('/products/edit/{id}','ProductController@edit')->name('product_edit');
	Route::post('/products/edit/{id}','ProductController@update');
	Route::delete('/products/delete/{id}','ProductController@destroy');

	Route::get('products/{id}/add-cart','PageController@add');
	Route::get('products/cart','PageController@show');

	/* For Categories */ 
	Route::get('/categories','CategoryController@index')->name('categories');
	Route::get('/categories/create','CategoryController@create')->name('categories_create');
	Route::post('/categories/create','CategoryController@store');
	Route::get('/categories/edit/{id}','CategoryController@edit')->name('categories_edit');
	Route::post('/categories/edit/{id}','CategoryController@update');
	Route::delete('/categories/delete/{id}','CategoryController@destroy');
});
