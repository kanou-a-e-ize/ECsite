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
Route::post('logout', 'ShopController@destroy')
    ->middleware('auth:user')
    ->name('logout');

Route::get('index', 'ShopController@index')->name('index');

Route::get('create', 'ShopController@create');

Route::post('store', 'ShopController@store');

Route::get('shop/{p_id}/detail', 'ShopController@detail');

Route::delete('product/{p_id}', 'ShopController@delete');

Route::get('manageorder', 'ShopController@order');

/* カート側 */

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('member/login', 'CartController@create')->name('member.login');

Route::post('member/login', 'CartController@store')->middleware('guest');

Route::post('member/logout', 'CartController@memberdestroy')
    ->middleware('auth:member')
    ->name('logout');

Route::get('cart', 'CartController@index');

Route::get('cart/{p_id}/detail', 'CartController@detail');

Route::post('cart/{p_id}/detail', 'CartController@add');

Route::get('mycart', 'CartController@mycart');

Route::post('mycart', 'CartController@destroy');

Route::get('address', 'CartController@address');

Route::post('confirm', 'CartController@confirm');

Route::post('checkout', 'CartController@resister');

