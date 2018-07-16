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

Route::get('/', 'VideosController@guestHomeDisplay');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('movies','VideosController');

Route::resource('configurations', 'ConfigsController');

Route::post('/priceConfiguration', function (){
    return view('adminPages.priceConfigurations');
});

Route::get('/priceConfiguration', function (){
    return view('adminPages.priceConfigurations');
})->name('priceConfig');

Route::post('/genreConfiguration', function (){
    return view('adminPages.genreConfigurations');
});

Route::get('/genreConfiguration', function (){
    return view('adminPages.genreConfigurations');
})->name('genreConfig');

Route::post('/addGenre', 'ConfigsController@addGenre');

Route::get('/allMovies', 'VideosController@AllMovies');

Route::get('movieDetails', 'VideosController@selectedMovieDetails');

Route::post('addToCart', 'OrdersController@addToCart');

Route::get('/order', 'OrdersController@processOrder');

Route::post('/completeOrder', 'OrdersController@completeOrder');


