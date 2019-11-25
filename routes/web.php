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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['prefix' => '/'], function () {
    Route::get('','ProductController@index')->name('product.index');
    Route::get('create','ProductController@getStore')->name('product.add');
    Route::post('create','ProductController@store')->name('product.store');
});