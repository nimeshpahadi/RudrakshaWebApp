<?php

Route::resource('/', 'ShopController');

Route::get('{id}/detail','ShopController@detail' )->name('product.detail');