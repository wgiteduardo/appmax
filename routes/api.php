<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/stock/add/{product}', 'Api\ProductController@add')->name('api.stock.add');
Route::post('/stock/remove/{product}', 'Api\ProductController@remove')->name('api.stock.remove');