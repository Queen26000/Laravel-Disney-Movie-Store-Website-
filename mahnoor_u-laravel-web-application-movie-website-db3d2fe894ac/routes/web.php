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



Route::get('/admin-movies', 'MovieController@index')->name('movie-admin');
Route::get('/movies/create', 'MovieController@create')->name('movie-create');
Route::post('/movies/store', 'MovieController@store')->name('movie-store');
Route::get('/admin-movies/{id}', 'MovieController@show')->name('movie-show');
Route::delete('/admin-movies/{id}', 'MovieController@destroy')->name('movie-destroy');
Route::get('/shop', 'MovieController@getIndex')->name('movie-shop');
Route::get('/add-to-cart/{id}', 'MovieController@getAddToCart')->name('movie-cart');
Route::get('/reduce/{id}', 'MovieController@getReduceByOne')->name('cart-reduce');
Route::get('/remove/{id}', 'MovieController@getRemoveItem')->name('cart-remove');
Route::get('/shopping-cart', 'MovieController@getCart')->name('shopping-cart');
Route::get('/checkout', 'MovieController@getCheckout')->name('checkout');
Route::post('/checkout', 'MovieController@postCheckout')->name('movie-checkout');

Auth::routes();

Route::get('contact/home', 'MessagesController@index')->name('messages-home');
Route::get('contact/create/{id?}/{subject?}', 'MessagesController@create')->name('messages-create');
Route::post('contact/send', 'MessagesController@send')->name('messages-send');
Route::get('contact/sent', 'MessagesController@sent')->name('sent-messages');
Route::get('contact/read/{id}', 'MessagesController@read')->name('messages-read');
Route::get('contact/delete/{id}', 'MessagesController@delete')->name('messages-delete');
Route::get('contact/deleted', 'MessagesController@deleted')->name('deleted-messages');
Route::get('contact/return/{id}', 'MessagesController@return')->name('messages-return');

Route::get('/', 'PagesController@home')->name('home');
Route::get('/about', 'PagesController@about')->name('about');;
Route::get('/movies', 'PagesController@movies')->name('movies');
Route::get('/movies/{id}', 'PagesController@display')->name('movies-display');
