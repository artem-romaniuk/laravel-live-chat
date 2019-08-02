<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['as' => 'api.chat.', 'namespace' => 'Api', 'middleware' => [/*'auth:api'*/]], function () {
    Route::get('chat', 'ChatController@getMessages')->name('messages');
    Route::post('chat', 'ChatController@postMessage')->name('post');
});
