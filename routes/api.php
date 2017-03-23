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

Route::get('/user/list', 'User\UserRegisterController@getUsers')->middleware('auth:api');
Route::post('/user/create', 'User\UserRegisterController@createUser');

Route::get('/product/list', 'Product\ProductApiController@getProductList');
Route::get('/product/detail/{id}', 'Product\ProductApiController@getProductDetailList');

Route::get('/category/list', 'Category\CategoryApiController@getCategoryList');
Route::get('/category/{id}/benefit', 'Category\CategoryApiController@getCategoryBenefit');

Route::get('/capping/list', 'Capping\CappingApiController@getCappingData');
