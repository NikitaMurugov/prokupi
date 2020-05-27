<?php


use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/cabinet', 'CabinetController@index')->name('cabinet');

//Route::model('Category', Category);
//Route::model('Product', Product);



Route::get('/products', 'ProductController@search')->name('search');
Route::get('/product/add', 'ProductController@add')->name('product_add');
Route::post('/product/submit', 'ProductController@submit')->name('product_submit');
//Route::get('/products/{Product}', 'ProductController@get')->name('product_get');
//Route::get('/products/', 'ProductController@search')->name('search');

Route::post('/update/user', 'CabinetController@update_user')->name('update_user');
