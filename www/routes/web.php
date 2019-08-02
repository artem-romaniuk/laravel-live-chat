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

Auth::routes();

Route::group(['namespace' => 'Front'], function () {
    Route::get('/', 'ChatController@index')->name('home');
});

Route::group(['namespace' => 'Front', 'as' => 'chat.', 'middleware' => ['auth']], function () {
    Route::get('chat', 'ChatController@chat')->name('room');
});
