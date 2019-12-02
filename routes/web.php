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

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/product', 'ProductController@index');
Route::post('/product', 'ProductController@store')->name('store_product');
Route::put('/product', 'ProductController@update')->name('update_product');
Route::delete('/product/{id}','ProductController@delete')->name('delete_product');
Route::post('/product/add_stock', 'ProductController@add_stock')->name('add_stock_product');


Route::get('/stock', 'StockController@index');
Route::post('/stock', 'StockController@store')->name('add_stock');
Route::put('/stock', 'StockController@update')->name('update_stock');
Route::delete('/stock/{id}', 'StockController@delet')->name('delete_stock');

Route::get('/about', function () {
    return view('about');
})->middleware('auth');;

Route::get('/user', 'UserController@index');





