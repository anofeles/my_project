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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//
//Route::group(['namespace' => '\TestCMS\Http\Controllers\Frontend', 'prefix'=>'json'], function () {
////    Route::any('/signal','WebController@signalJson')->name('signalJson')->middleware('XSS');
//    Route::get('/','WebController@token')->name('token');
//});

//Route::post('register', 'UserController@register');
//Route::post('login', 'UserController@login');
//Route::get('profile', 'UserController@getAuthenticatedUser');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
