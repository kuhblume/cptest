<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//messageルート/////////////////////////////////////////////////////////////////
Route::get('/message', function () {
    return view('message');
});

Route::get('message','GroupController@show');

//message_roomsルート///////////////////////////////////////////////////////////
Route::get('/message_rooms', function () {
    return view('message_rooms');
});