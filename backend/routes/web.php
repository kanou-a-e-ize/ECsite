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
Route::get('shopindex', 'ShopController@index');

Route::get('create', 'ShopController@create');

Route::post('store', 'ShopController@store');

Route::get('shop/{p_id}/detail', 'ShopController@detail');

Route::delete('product/{p_id}', 'ShopController@destroy');

Route::get('manageorder', 'ShopController@order');

Route::get('cart', 'CartController@index');

Route::get('cart/{p_id}/detail', 'CartController@detail');

Route::post('cart/{p_id}/detail', 'CartController@store');

Route::get('mycart', 'CartController@mycart');

Route::post('mycart', 'CartController@destroy');

Route::get('address', 'CartController@address');

Route::post('confirm', 'CartController@confirm');

Route::post('checkout', 'CartController@resister');