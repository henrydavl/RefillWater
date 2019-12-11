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

Route::group(['middleware'=>'auth:api'], function(){
    Route::get('user', function (){
        dd('salut');
    });
    Route::apiResource('my-ticket', 'Api\TicketController');
    Route::apiResource('refill', 'Api\TransactionController');
    Route::get('my-bottle', 'Api\UserController@getMyBottle');
    Route::get('my-topUp', 'Api\ApplicationController@getTopUpHistory');
    Route::get('profile', 'Api\UserController@profile');
});

Route::post('login', 'Api\Auth\LoginController@login');
Route::post('logout', 'Api\Auth\LoginController@logout');
Route::post('refresh', 'Api\Auth\LoginController@refresh');
Route::post('register', 'Api\Auth\RegisterController@register');

Route::get('gallons', 'Api\ApplicationController@getGallon')->name('api.gallons');
Route::get('ads', 'Api\ApplicationController@getAds')->name('api.ads');
