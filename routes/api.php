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

Route::post('/adicionar-produtos/{product}', 'Api\ProductController@add')->name('api.stock.add');
Route::post('/baixar-produtos/{product}', 'Api\ProductController@remove')->name('api.stock.remove');