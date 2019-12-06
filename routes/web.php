<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'root'], function (){
    Route::get('root/dashboard', 'Root\PageController@dashboard')->name('root');
    Route::get('root/root', 'Root\UserController@root')->name('user.root');
    Route::get('root/administrator', 'Root\UserController@admin')->name('user.admin');
    Route::get('root/bureau', 'Root\UserController@bureau')->name('user.bureau');
    Route::get('root/user/deactivate', 'Root\UserController@deactivate')->name('user.deactivate');
    Route::post('root/user/deactivate', 'Root\UserController@deactivate');
    Route::get('root/user/activate', 'Root\UserController@activate')->name('user.activate');
    Route::post('root/user/activate', 'Root\UserController@activate');

    Route::resource('root/ad', 'Root\AdsController');
    Route::resource('root/bottle', 'Root\BottleController');
    Route::resource('root/topup', 'Root\TopUpController');
    Route::resource('root/ticket', 'Root\TicketController');
    Route::resource('root/user', 'Root\UserController');
    Route::resource('root/transaction', 'Root\TranController');
    
});

Route::group(['middleware'=>'admin'], function (){
    Route::get('admin/dashboard', 'Admin\PageController@dashboard')->name('admin');
});

Route::group(['middleware'=>'bureau'], function (){
    Route::get('bureau/dashboard', 'Bureau\PageController@dashboard')->name('bureau');
});
