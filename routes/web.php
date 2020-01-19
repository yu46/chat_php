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

Route::get('groups','GroupsController@index');

Route::get('messages', 'MessagesController@index');
Route::get('messages/create', 'MessagesController@create');
Route::post('messages', 'MessagesController@store');

Auth::routes();
Route::get('user/{id}/edit', 'UserController@edit');
Route::patch('user/{id}', 'UserController@update');

Route::get('/home', 'HomeController@index')->name('home');
