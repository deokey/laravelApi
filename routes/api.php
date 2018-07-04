<?php

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', 'API\UserController@login')->name('login');
Route::post('register', 'API\UserController@register')->name('register');
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('details', 'API\UserController@details');
});

Route::get('product/get', 'Product\ProductController@getProducts')->name('getAllProducts');
Route::get('product/{value}', 'Product\ProductController@getProduct')->name('getProduct');
Route::post('product/add', 'Product\ProductController@addProduct')->name('addProduct');
Route::post('product/update/{value}', 'Product\ProductController@updateProduct')->name('updateProduct');
Route::get('product/delete/{value}', 'Product\ProductController@deleteProduct')->name('deleteProduct');
