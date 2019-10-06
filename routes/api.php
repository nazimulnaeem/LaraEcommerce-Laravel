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


// route for Cart
Route::group(['prefix'=>'carts', 'namespace'=>'Api'],function(){

    Route::get('/', 'CartController@index')->name('carts');
    Route::post('/store', 'CartController@store')->name('cart.store');
    Route::post('/update/{id}', 'CartController@update')->name('cart.update');
    Route::delete('/delete/{id}', 'CartController@destroy')->name('cart.delete');
    
    });