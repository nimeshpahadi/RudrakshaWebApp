<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/13/17
 * Time: 10:50 AM
 */

Route::get('/login', 'AdminController@getAdmin')->middleware('auth:admin');

Route::post('/hello', 'AdminController@index');

Route::resource('/category', 'CategoryAdminController');
Route::resource('/products', 'ProductAdminController');
// productdescription
Route::get('/products/{id}/description', 'ProductAdminController@createDesc')->name('product_description');
Route::post('/products/description', 'ProductAdminController@storeDesc')->name('product_description_add');
Route::get('/product_desc/{id}/edit', 'ProductAdminController@editDesc')->name('product_desc_edit');
Route::put('/product_desc/{id}', 'ProductAdminController@updateDesc')->name('product_desc_update');

Route::get('/products/{id}/image', 'ProductAdminController@createImage')->name('product_image');
Route::post('/products/image', 'ProductAdminController@storeImage')->name('product_image_add');
Route::put('/product_image/{id}', 'ProductAdminController@updateImage')->name('product_image_update');
Route::delete('/product_img/{id}/{name}', 'ProductAdminController@deleteImage')->name('product_image_delete');


Route::delete('/product_desc/{id}', 'ProductAdminController@deleteDesc')->name('product_desc_delete');
