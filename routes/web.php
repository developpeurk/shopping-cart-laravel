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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/store', 'HomeController@store')->name('store');
Route::get('/product', 'ProductController@index')->name('product.index');
Route::get('/addTocart/{product}', 'ProductController@addTocart')->name('cart.add');
Route::get('/shopping-cart', 'ProductController@showCart')->name('cart.show');
Route::get('/checkout-cart/{amount}', 'ProductController@checkout')->name('cart.checkout')->middleware('auth');
Route::post('/charge', 'ProductController@charge')->name('cart.charge');
Route::get('/orders', 'OrderController@index')->name('order.index');


Route::get('/users','PaymentController@index');
Route::post('/users/store', 'PaymentController@store')->name('user.add');
Route::get('/users/{id}','PaymentController@show')->name('user.show');