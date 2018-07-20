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

Route::get('/', 'VideosController@guestHomeDisplay')->name('client');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('movies','VideosController');

Route::resource('configurations', 'ConfigsController');

Route::post('/priceConfiguration', 'ConfigsController@priceConfig')->name('priceConfig');

Route::get('/priceConfiguration', 'ConfigsController@priceConfig')->name('priceConfig');

Route::post('/genreConfiguration', 'ConfigsController@genreConfig')->name('genreConfig');

Route::get('/genreConfiguration', 'ConfigsController@genreConfig')->name('genreConfig');

Route::post('/addGenre', 'ConfigsController@addGenre');

Route::get('/allMovies', 'VideosController@AllMovies');

Route::get('/newOrders', 'OrdersController@newOrders');

Route::get('movieDetails', 'VideosController@selectedMovieDetails');

Route::get('addToCart', 'OrdersController@addToCart')->middleware('auth');

Route::get('addToCart', 'OrdersController@addToCart')->middleware('auth');

Route::get('/order', 'OrdersController@processOrder')->middleware('auth');

Route::post('/completeOrder', 'OrdersController@completeOrder');

Route::get('/cart', 'OrdersController@ShoppingCartDetails')->middleware('auth');;

Route::get('/deleteCart', 'OrdersController@deleteFromCart');

Route::get('/oderApproval', 'OrdersController@oderApproval');

Route::post('/orderAll', 'OrdersController@processOrder');

Route::post('/search', 'VideosController@search');

Route::get('/deleteMovie', 'VideosController@destroy');

// Route::get('/test', 'VideosController@form');

Route::get('/test2', 'VideosController@form2');

// Route::post('/tests', 'VideosController@test');

// Route::get('/tests2', 'VideosController@test');


