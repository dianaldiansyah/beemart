<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','App\Http\Controllers\DashboardController@index');
Route::get('/login','App\Http\Controllers\AuthController@login');
Route::get('/logout','App\Http\Controllers\AuthController@logout');
Route::post('/login/validate','App\Http\Controllers\AuthController@validateLogin');

Route::get('/transaction','App\Http\Controllers\TransactionController@index');

Route::get('/product','App\Http\Controllers\ProductController@index');
Route::get('/product/new','App\Http\Controllers\ProductController@create');
Route::get('/product/edit/{productId}','App\Http\Controllers\ProductController@edit');
Route::post('/product/store','App\Http\Controllers\ProductController@store');
Route::post('/product/update','App\Http\Controllers\ProductController@update');
Route::post('/product/delete','App\Http\Controllers\ProductController@delete');

Route::get('/customer','App\Http\Controllers\CustomerController@index');
Route::get('/customer/new','App\Http\Controllers\CustomerController@create');
Route::get('/customer/edit/{customerId}','App\Http\Controllers\CustomerController@edit');
Route::post('/customer/store','App\Http\Controllers\CustomerController@store');
Route::post('/customer/update','App\Http\Controllers\CustomerController@update');
Route::post('/customer/delete','App\Http\Controllers\CustomerController@delete');

Route::get('/staff','App\Http\Controllers\StaffController@index');
Route::get('/staff/new','App\Http\Controllers\StaffController@create');
Route::get('/staff/edit/{staffId}','App\Http\Controllers\StaffController@edit');
Route::post('/staff/store','App\Http\Controllers\StaffController@store');
Route::post('/staff/update','App\Http\Controllers\StaffController@update');
Route::post('/staff/delete','App\Http\Controllers\StaffController@delete');
