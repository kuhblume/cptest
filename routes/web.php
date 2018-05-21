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
Route::get('/message','GroupController@show');

//message_roomsルート///////////////////////////////////////////////////////////{id?}は任意のパラメーター
Route::get('/message_rooms','MessageController@show');
Route::post('/message_rooms','MessageController@create');


//create_message_roomルート/////////////////////////////////////////////////////
Route::get('/create_message_room', function () {return view('create_message_room');});