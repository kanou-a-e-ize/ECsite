<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('welcome', function () {
    return view('welcome');
});

/* 店舗側 */
Route::get('login', 'ShopController@create')->name('login');

Route::post('login', 'ShopController@store')->middleware('guest');

Route::post('logout', 'ShopController@destroy')
    ->middleware('auth:user')
    ->name('logout');

Route::middleware('auth:user')->group(function () {
    Route::get('index', 'ShopController@index')->name('index');

    Route::get('create', 'ShopController@createproduct');

    Route::post('store', 'ShopController@storeproduct');

    Route::get('shop/{p_id}/detail', 'ShopController@detail');

    Route::delete('product/{p_id}', 'ShopController@delete');

    Route::get('manageorder', 'ShopController@order');

    Route::get('customer/{customer_id}/info', 'ShopController@customerinfo');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/* カート側 */

Route::get('member/login', 'CartController@create')->name('member.login');

Route::post('member/login', 'CartController@store')->middleware('guest');

Route::post('member/logout', 'CartController@destroy')
    ->middleware('auth:member')
    ->name('logout');

Route::middleware('auth:member')->group(function () {
    Route::get('cart/index', 'CartController@index');

    Route::get('cart/{p_id}/detail', 'CartController@detail');

    Route::post('cart/{p_id}/detail', 'CartController@add');

    Route::get('cart/mycart', 'CartController@mycart');

    Route::post('cart/mycart', 'CartController@delete');

    Route::get('cart/address', 'CartController@address');

    Route::post('cart/confirm', 'CartController@confirm');

    Route::post('cart/checkout', 'CartController@resister');
});