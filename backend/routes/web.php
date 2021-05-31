<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;

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

Route::get('product/shopindex', 'ShopController@index');

//Route::middleware(['auth:sanctum', 'verified'])->get('product/shopindex', 'ShopController@index');

Route::get('product/create', 'ShopController@create')->name("create_product");

Route::post('post', 'ShopController@store')->name("upload_product");

Route::get('product/manageorder', 'ShopController@order');

Route::delete('product/{p_id}', 'ShopController@destroy');

Route::get('cart', 'CartController@index');

Route::get('/', 'CartController@index');

Route::get('cart/{p_id}/detail', 'CartController@detail');


Route::post('cart/{p_id}/store', 'CartController@store');

Route::get('cart/mycart', 'CartController@mycart');

Route::delete('cart/{stock_id}', 'CartController@destroy');

Route::get('cart/address', 'CartController@address');