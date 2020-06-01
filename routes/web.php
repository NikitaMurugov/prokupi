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
Route::get('/product/add', 'ProductController@add')->name('product.add');
Route::post('/product/submit', 'ProductController@submit')->name('product.submit');
Route::get('/product/edit/{product_id}', 'ProductController@edit')->name('product.edit');
Route::get('/products/{product_id}', 'ProductController@get')->name('product.get');

Route::post('/update/user', 'UpdateController@updateUser')->name('update.user');
Route::post('/update/product', 'UpdateController@updateProduct')->name('update.product');

Route::post('/delete/product', 'DeleteController@deleteProduct')->name('delete.product');
