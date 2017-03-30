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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/dashboard', 'Admin\AdminController@index')->name('admin.dashboard');

Route::get('/users/confirmation/{token}', 'Auth\RegisterController@confirmation')->name('confirmation');

//customer
Route::resource('/profile', 'Customer\CustomerController');
Route::put('/profile/{id}/image', 'Customer\CustomerController@updateimage')->name('customer.updateimage');

Route::get('/profile/{id}/password', 'Customer\CustomerController@password')->name("password");
Route::patch('/profile/{id}/password', 'Customer\CustomerController@changepassword')->name("changepassword");

// customer address
Route::get('/profile/{id}/address', 'Customer\CustomerAddressController@create')->name('customers.address');
Route::get('/profile/{id}/address/edit', 'Customer\CustomerAddressController@edit')->name('customers.address.edit');
Route::post('/profile/address', 'Customer\CustomerAddressController@store')->name('customers.address.store');
Route::put('/profile/{id}/address/update', 'Customer\CustomerAddressController@update')->name('customers.address.update');

// Customer Delivery Address
Route::get('/customers/{id}/deliveryaddress', 'Customer\DeliveryAddressController@index')->name("deliveryaddress");
Route::post('/customers/deliveryaddress', 'Customer\DeliveryAddressController@store')->name("customers.delivery.store");
Route::get('/customers/{id}/delivery/edit', 'Customer\DeliveryAddressController@edit')->name("deliveryaddress.edit");
Route::put('/customers/{id}/delivery/update', 'Customer\DeliveryAddressController@update')->name("deliveryaddress.update");

