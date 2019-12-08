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

View::composer('layouts.app', function ($view) {
    $view->with('cart', \App\Cart::all()->count());
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/product', 'ProductController@index');
Route::post('/product', 'ProductController@store')->name('store_product');
Route::put('/product', 'ProductController@update')->name('update_product');
Route::delete('/product/{id}','ProductController@delete')->name('delete_product');
Route::post('/product/add_stock', 'ProductController@add_stock')->name('add_stock_product');


Route::get('/stock', 'StockController@index');
Route::post('/stock', 'StockController@store')->name('add_stock');
Route::put('/stock', 'StockController@update')->name('update_stock');
Route::delete('/stock/{id}', 'StockController@delete')->name('delete_stock');

Route::get('/cart', 'CartController@index');
Route::post('/cart', 'CartController@store')->name('add_cart');
Route::delete('/cart/{id}', 'CartController@delete')->name('delete_cart');

Route::get('/invoice', 'InvoiceController@index');
Route::post('/invoice', 'InvoiceController@store')->name('add_invoice');
Route::get('/invoice/edit/{id}','InvoiceController@edit')->name('edit_invoice');
Route::put('/invoice/{id}', 'InvoiceController@update')->name('update_invoice');
Route::delete('/invoice/{id}', 'InvoiceController@delete')->name('delete_invoice');

Route::get('/sales', 'SalesController@index');
Route::get('/sales/{id}', 'SalesController@show');


Route::get('/about', function () {
    return view('about');
})->middleware('auth');;

Route::get('/user', 'UserController@index');