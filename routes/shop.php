<?php

Route::resource('/', 'ShopController');

Route::get('{id}/detail','ShopController@detail' )->name('product.detail');
Route::get('/aboutus','ShopController@aboutUs' )->name('aboutus');
Route::get('/contact','ShopController@contact' )->name('contact');
Route::get('/faq','ShopController@faq' )->name('faq');

Route::resource('/order','OrderController');

Route::get('/cart','OrderController@cart' )->name('cart');
Route::delete('customerid={customer_id}/cart/clearall','OrderController@clearall' )->name('cart.clear');



