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

Route::get('product/create', 'ShopController@create');

Route::post('/post', 'ShopController@store');

Route::delete('/product/{p_id}', 'ShopController@destroy');

