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
    Route::get('test-token', function (){ //done
        return response([
            'message' => 'ok',
        ]);
    });
    Route::apiResource('my-ticket', 'Api\TicketController'); //done
    Route::apiResource('refill', 'Api\TransactionController'); //done
    Route::get('my-bottle', 'Api\UserController@getMyBottle'); //done
    Route::get('my-topUp', 'Api\ApplicationController@getTopUpHistory'); //done
    Route::get('profile', 'Api\UserController@profile'); //done
    Route::post('edit-profile', 'Api\UserController@editProfile'); //done
    Route::post('logout', 'Api\Auth\LoginController@logout'); //done
});

Route::post('login', 'Api\Auth\LoginController@login'); //done
Route::post('refresh', 'Api\Auth\LoginController@refresh'); //done
Route::post('register', 'Api\Auth\RegisterController@register'); //done
Route::post('forgot', 'Api\Auth\LoginController@forgotCheck'); //done
Route::post('new-password', 'Api\Auth\LoginController@forgotPassword'); //done

Route::get('gallons/{gallon}', 'Api\ApplicationController@specific'); //done
Route::get('gallons/{id}/{done}', 'Api\ApplicationController@statusGallon'); //done
Route::get('gallons', 'Api\ApplicationController@getGallon')->name('api.gallons'); //done
Route::get('ads', 'Api\ApplicationController@getAds')->name('api.ads'); //done
