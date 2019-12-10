<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/activate', 'Auth\ActivationController@activate')->name('activate');
Route::get('/resend', 'Auth\ActivationController@showResendForm')->name('resend');
Route::post('/resend', 'Auth\ActivationController@resend');

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
    Route::resource('root/topup', 'Root\TopUpController')->only('index');
    Route::resource('root/ticket', 'Root\TicketController');
    Route::resource('root/user', 'Root\UserController');
    Route::resource('root/transaction', 'Root\TranController')->only('index');
    Route::resource('root/galon', 'Root\GalonController')->only('index');
    
});

Route::group(['middleware'=>'admin'], function (){
    Route::get('admin/dashboard', 'Admin\PageController@dashboard')->name('admin');
    Route::get('Admin/users/deactivate', 'Admin\UsersController@deactivate')->name('users.deactivate');
    Route::post('Admin/users/deactivate', 'Admin\UsersController@deactivate');
    Route::get('Admin/users/activate', 'Admin\UsersController@activate')->name('users.activate');
    Route::post('Admin/users/activate', 'Admin\UsersController@activate');

    Route::resource('admin/advertisement', 'Admin\AdvController');
    Route::resource('admin/users', 'Admin\UsersController');
    Route::resource('admin/tickets', 'Admin\TicketsController');
    Route::resource('admin/bottles', 'Admin\BottlesController');
    Route::resource('admin/top-up', 'Admin\TopUpsController');
    Route::resource('admin/transactions','Admin\TransController');
    Route::resource('admin/gallon', 'Admin\GallonController');
});

Route::group(['middleware'=>'bureau'], function (){
    Route::get('bureau/dashboard', 'Bureau\PageController@dashboard')->name('bureau');
    Route::resource('bureau/my-tickets', 'Bureau\TicController');
    Route::resource('bureau/rewards', 'Bureau\TopController');
});
