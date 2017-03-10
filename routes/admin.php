<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/13/17
 * Time: 10:50 AM
 */

Route::get('/login', 'AdminController@getAdmin');
Route::get('/hello', 'AdminController@index');

Route::resource('/category', 'CategoryController');
Route::resource('/category', 'CategoryAdminController');
Route::resource('/product', 'ProductAdminController');
Route::get('/product/{id}/description', 'ProductAdminController@createDesc')->name('product_description');
Route::post('/product/description', 'ProductAdminController@storeDesc')->name('product_description_add');

Route::get('/product/{id}/image', 'ProductAdminController@createImage')->name('product_image');
Route::post('/product/image', 'ProductAdminController@storeImage')->name('product_image_add');

