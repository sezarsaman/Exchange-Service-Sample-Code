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

Route::post('login', 'API\UsersController@login');
Route::post('register', 'API\UsersController@register');

Route::group(['prefix' => 'orders','middleware' => 'auth:api'], function(){
    Route::post('show', 'API\OrdersController@show');
    Route::post('store', 'API\OrdersController@store');
});
