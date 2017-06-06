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

// user
Route::get('/user_id', 'User\UserLoginController@userId')->middleware('auth:api');
Route::get('/user/details/{id}', 'User\UserLoginController@userDetails')->middleware('auth:api');
Route::post('/user/create', 'User\UserRegisterController@createUser');
Route::post('/user/login', 'User\UserLoginController@issueToken');
Route::put('/user/{id}/edit', 'User\UserRegisterController@userInfoUpdate');
Route::put('/user/{id}/image/edit', 'User\UserRegisterController@userImageUpdate');

// product
Route::get('/product/list', 'Product\ProductApiController@productList');
Route::get('/product/details/{id}', 'Product\ProductApiController@productDetailList');

// category
Route::get('/category/list', 'Category\CategoryApiController@categoryList');
Route::get('/category/{id}/benefit', 'Category\CategoryApiController@categoryBenefit');

// capping
Route::get('/capping/list', 'Capping\CappingApiController@cappingData');

// customer address
Route::get('/customer/{customer_id}/address', 'User\CustomerAddressApiController@customerAddressShow')->middleware('auth:api');;
Route::post('/customer/address/create', 'User\CustomerAddressApiController@customerAddressCreate');
Route::put('/customer/address/{id}/edit', 'User\CustomerAddressApiController@customerAddressEdit');

// customer delivery address
Route::get('/customer/{customer_id}/delivery/address', 'User\CustomerDeliveryAddressApiController@customerDeliveryAddressShow')->middleware('auth:api');;
Route::post('/customer/delivery/address/create', 'User\CustomerDeliveryAddressApiController@customerDeliveryAddressCreate');
Route::put('/customer/delivery/address/{id}/edit', 'User\CustomerDeliveryAddressApiController@customerDeliveryAddressEdit');

// order item
Route::get('/order/{customer_id}', 'Order\OrderApiController@show');
Route::post('/order/create', 'Order\OrderApiController@create');
Route::put('/order/{id}/edit/', 'Order\OrderApiController@edit');
Route::delete('/order/{id}/delete', 'Order\OrderApiController@destroy');
Route::delete('{customer_id}/cart/deleteall', 'Order\OrderApiController@deleteAll');

// order group
Route::post('/cart/group/create','Order\OrderGroupApiController@create');

// customer order history
Route::get('/order_history/{customer_id}', 'Order\OrderApiController@customerOrderHistory');
Route::get('/order_history_details/{group_id}', 'Order\OrderApiController@customerOrderHistoryDetails');
