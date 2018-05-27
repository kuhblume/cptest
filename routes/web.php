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
Route::post('/message_rooms/{id}','MessageController@create');
Route::get('/message_rooms/{id}','MessageController@show');
Route::delete('/message_rooms/{id}','MessageController@delete');
//create_message_roomルート/////////////////////////////////////////////////////
Route::post('/create_message_room','CreateRoomController@create');
Route::get('/create_message_room','CreateRoomController@show');
//Route::post('/create_message_room','CreateRoomController@val');