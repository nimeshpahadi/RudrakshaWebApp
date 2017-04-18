<?php

Route::resource('/', 'ShopController');

Route::get('{id}/detail','ShopController@detail' )->name('product.detail');
Route::get('/aboutus','ShopController@aboutUs' )->name('aboutus');
Route::get('/contact','ShopController@contact' )->name('contact');
Route::get('/faq','ShopController@faq' )->name('faq');