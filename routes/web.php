<?php

use Illuminate\Support\Facades\Route;



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

Route::get('/', 'MainController@menu');
Route::get('/cart', 'MainController@cart');

Route::post('/cart/add-to-cart', 'CartController@addToCart');
Route::post('/cart/decrease-by-id', 'CartController@decreaseById');
Route::post('/cart/remove-by-id', 'CartController@removeById');
