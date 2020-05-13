<?php


use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/cabinet', 'CabinetController@index')->name('cabinet');

Route::get('/products', 'ProductController@index')->name('products');
Route::get('/product/add', 'ProductController@add')->name('product_add');
Route::post('/product/submit', 'ProductController@submit')->name('product_submit');
Route::get('/products/{product}', 'ProductController@get')->name('product_{product}');
