<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/13/17
 * Time: 10:50 AM
 */


Route::resource('/category', 'CategoryAdminController');
Route::resource('/products', 'ProductAdminController');
Route::resource('/capping', 'CappingAdminController');
Route::resource('/customer', 'CustomerAdminController');
Route::resource('/currency', 'CurrencyAdminController');
Route::resource('/product_price', 'ProductPriceAdminController');

//category Benefits
Route::get('/category/{id}/benefit', 'CategoryAdminController@createBenefit')->name('category.benefit');
Route::post('/category/benefit', 'CategoryAdminController@storeBenefit')->name('category.benefit.store');
Route::get('/category/benefit/{id}/edit', 'CategoryAdminController@editBenefit')->name('category.benefit.edit');
Route::put('/category/benefit/{id}', 'CategoryAdminController@updateBenefit')->name('category.benefit.update');



// productdescription
Route::get('/products/{id}/description', 'ProductAdminController@createDesc')->name('product_description');
Route::post('/products/description', 'ProductAdminController@storeDesc')->name('product_description_add');
Route::get('/product_desc/{id}/edit', 'ProductAdminController@editDesc')->name('product_desc_edit');
Route::put('/product_desc/{id}', 'ProductAdminController@updateDesc')->name('product_desc_update');
//image
Route::get('/products/{id}/image', 'ProductAdminController@createImage')->name('product_image');
Route::post('/products/image', 'ProductAdminController@storeImage')->name('product_image_add');
//Route::put('/product_image/{id}', 'ProductAdminController@updateImage')->name('product_image_update');


Route::delete('/product_img/{id}', 'ProductAdminController@deleteImage')->name('product_image_delete');
Route::delete('/product_desc/{id}', 'ProductAdminController@deleteDesc')->name('product_desc_delete');
Route::delete('/category/benefit/{id}/delete', 'CategoryAdminController@deleteBenefit')->name('category.benefit.delete');

//capping image update
Route::get('/capping/{id}/image', 'CappingAdminController@editImage')->name('capping.editImage');
Route::put('/capping/{id}/updateimage', 'CappingAdminController@updateImage')->name('capping.updateImage');

