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
Route::group(['middleware' => ['XSS', 'Cors'], 'namespace' => '\TestCMS\Http\Controllers\Frontend'], function () {
    Route::any('/', 'WebController@admin')->name('admin');
    Route::get('/logout', 'AuthController@logout')->name('logout');
});
