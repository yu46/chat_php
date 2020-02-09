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


Route::middleware(['auth'])->group(function(){
  Route::get('/','GroupsController@index');

  //group
  Route::get('groups','GroupsController@index');
  Route::get('groups/create', 'GroupsController@create');
  Route::post('groups', 'GroupsController@store');
  Route::get('groups/{id}/edit', 'GroupsController@edit');
  Route::patch('groups/{id}', 'GroupsController@update');

  //user
  Route::get('user/{id}/edit', 'UserController@edit');
  Route::patch('user/{id}', 'UserController@update');

  //prefix groups/{group_id}
  Route::prefix('groups/{group_id}/')->group(function(){
    //message
    Route::get('messages', 'MessagesController@index');
    Route::post('messages', 'MessagesController@store');

    Route::middleware(['api'])->group(function(){
      Route::get('api/messages', 'Api\MessagesController@index');
    });
  });
  
});

Auth::routes();

