<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;

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

Route::get('auth/login', function () {
    return view('auth/login');
});

Route::get('shopindex', 'ShopController@index');

Route::get('create', 'ShopController@create');

Route::post('post', 'ShopController@store');

Route::get('manageorder', 'ShopController@order');

Route::delete('product/{p_id}', 'ShopController@destroy');

Route::get('cart', 'CartController@index');

Route::get('cart/{p_id}/detail', 'CartController@detail');

Route::post('cart/{p_id}/detail', 'CartController@detail');

Route::get('cart/mycart', 'CartController@mycart');

Route::post('cart/mycart', function () {
    return view('cart/mycart');
});

Route::post('cart/address', 'CartController@order');

Route::get('cart/address', 'CartController@address');

Route::post('cart/post', 'CartController@resister');

Route::get('cart/checkout', function () {
    return view('cart/checkout');
});