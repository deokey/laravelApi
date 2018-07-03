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

Route::get('products/get', 'Products\ProductsController@getProducts')->name('getAllProducts');
Route::get('products/{id}', 'Products\ProductsController@getProduct')->name('getProductById');
Route::post('products/add', 'Products\ProductsController@addProducts')->name('addProducts');
Route::post('products/update/{id}', 'Products\ProductsController@updateProduct')->name('updateProductById');
Route::get('products/delete/{id}', 'Products\ProductsController@deleteProduct')->name('deleteProduct');
