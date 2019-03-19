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

Route::get('/', ['uses'=>'IndexController@show','as'=>'index']);

Route::get('cart', ['uses'=>'CartController@show','as'=>'cart']);
Route::match(['GET','POST'],'cart/{id}', ['uses'=>'CartController@add','as'=>'cart_add']);

Route::get('product/{id}', ['uses'=>'ProductController@show','as'=>'product']);

Route::match(['GET','POST'],'products/{category}', ['uses'=>'ProductsController@show','as'=>'products']);

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
