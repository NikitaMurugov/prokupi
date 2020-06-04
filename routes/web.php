<?php


use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin', 'AdminController@index')->name('admin');

    Route::get('/admin/users', 'AdminController@getUsers')->name('admin.users');
    Route::get('/admin/user/{user_id}', 'AdminController@getUser')->name('admin.user');
    Route::get('/admin/edit/user/{user_id}', 'AdminController@editUser')->name('admin.edit.user');
    Route::post('/admin/update/user/{user_id}', 'AdminController@updateUser')->name('admin.update.user');
    Route::post('/admin/delete/user/{user_id}', 'AdminController@deleteUser')->name('admin.delete.user');
    Route::post('/admin/recover/user/{user_id}', 'AdminController@recoverUser')->name('admin.recover.user');

    Route::get('/admin/products', 'AdminController@getProducts')->name('admin.products');
    Route::get('/admin/product/{product_id}', 'AdminController@getProduct')->name('admin.product');
    Route::get('/admin/edit/product/{product_id}', 'AdminController@editProduct')->name('admin.edit.product');
    Route::post('/admin/update/product/{product_id}', 'AdminController@updateProduct')->name('admin.update.product');
    Route::post('/admin/delete/product/{product_id}', 'AdminController@deleteProduct')->name('admin.delete.product');
});

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
Route::post('/update/product/{product_id}', 'UpdateController@updateProduct')->name('update.product');

Route::post('/delete/product/{product_id}', 'DeleteController@deleteProduct')->name('delete.product');
Route::post('/delete/user', 'DeleteController@deleteUser')->name('delete.user');
