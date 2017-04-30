<?php

Route::resource('/', 'ShopController');

Route::get('{id}/detail','ShopController@detail' )->name('product.detail');
Route::get('/aboutus','ShopController@aboutUs' )->name('aboutus');
Route::get('/contact','ShopController@contact' )->name('contact');
Route::get('/faq','ShopController@faq' )->name('faq');

Route::resource('/order','OrderController');

Route::get('/cart','OrderController@cart' )->name('cart');
Route::delete('customerid={customer_id}/cart/clearall','OrderController@clearall' )->name('cart.clear');
Route::post('/cart/group','OrderController@cartGroup' )->name('cart.group');



// ajax call
Route::get('/cart/summary', 'OrderController@cartSummary')->name('cartSummary');
Route::get('/cart/count', 'OrderController@cartCount')->name('cartCount');
