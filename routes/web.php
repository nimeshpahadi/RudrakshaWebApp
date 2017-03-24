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

