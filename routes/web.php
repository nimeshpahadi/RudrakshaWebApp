<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin', 'Admin\AdminController@index')->name('admin.dashboard');

Route::get('/users/confirmation/{token}', 'Auth\RegisterController@confirmation')->name('confirmation');

//customer
Route::resource('/customers', 'CustomerController');
Route::put('/customers/{id}/image', 'CustomerController@updateimage')->name('customer.updateimage');

Route::get('/customers/{id}/password', 'CustomerController@password')->name("password");
Route::patch('/customers/{id}/password', 'CustomerController@changepassword')->name("changepassword");

// customer address
Route::get('/customers/{id}/address', 'CustomerAddressController@create')->name('customers.address');
Route::get('/customers/{id}/address/edit', 'CustomerAddressController@edit')->name('customers.address.edit');
Route::post('/customers/address', 'CustomerAddressController@store')->name('customers.address.store');
Route::put('/customers/{id}/address/update', 'CustomerAddressController@update')->name('customers.address.update');

// Customer Delivery Address
Route::get('/customers/{id}/deliveryaddress', 'DeliveryAddressController@index')->name("deliveryaddress");
Route::post('/customers/deliveryaddress', 'DeliveryAddressController@store')->name("customers.delivery.store");
Route::get('/customers/{id}/delivery/edit', 'DeliveryAddressController@edit')->name("deliveryaddress.edit");
Route::put('/customers/{id}/delivery/update', 'DeliveryAddressController@update')->name("deliveryaddress.update");

