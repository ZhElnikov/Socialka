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

Route::auth();
Auth::routes();

Route::get('/', 'RoomController@getNum');
Route::get('/home', 'RoomController@getNum');
Route::get('/rooms', 'RoomController@getIndex');

Route::get('/profile', 'ProfileController@getIndex');
Route::get('/users', 'UserController@getUsers');
Route::get('/friends', 'UserController@getFriends');
Route::get('/user/{id}', 'UserController@getIndex')->where('id','[0-9]+');
Route::get('/room/{id}', 'RoomController@getNum')->where('id','[0-9]+');
Route::get('/room/{thisid}/exit/{id}', 'RoomController@closeRoom')->where('id','[0-9]+')->where('thisid','[0-9]+');
Route::get('/addprivateroom/{id}','RoomController@postPrivateRoom')->where('id','[0-9]+');
Route::get('/privateroom/{id}','RoomController@getPrivateRoom')->where('id','[0-9]+');
Route::get('/addfriend/{id}','UserController@addfriend')->where('id','[0-9]+');
//Route::get('/logout', 'UserController@logout');

Route::post('/message/{id}','MessageController@postIndex')->where('id','[0-9]+');
Route::post('/addroom','RoomController@postIndex');
Route::post('/profile','ProfileController@postIndex');

//Route::get('/home', 'HomeController@index');
