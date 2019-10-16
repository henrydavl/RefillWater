<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'root'], function (){
    Route::get('/root/dashboard', 'Root\PageController@dashboard')->name('root');
});

Route::group(['middleware'=>'admin'], function (){
    Route::get('/admin/dashboard', 'Admin\PageController@dashboard')->name('admin');
});

Route::group(['middleware'=>'bureau'], function (){
    Route::get('/bureau/dashboard', 'Bureau\PageController@dashboard')->name('bureau');
});
