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


use App\Produk as Prd;
use App\Kategori as Kateg;
use App\Merk;


///------------------------------------------------------------------------------------------
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin','AdminController@admin')->name('admin');


Route::get('admin/category','categoryController@index')->name('admincategory');
Route::get('admin/category/formshow','categoryController@formShow');
Route::post('admin/category/store','categoryController@store');
Route::get('admin/category/update/{id}','categoryController@update');
Route::put('admin/category/update/{id}','categoryController@update');
Route::get('admin/category/destroy/{id}','categoryController@destroy');

Route::get('admin/merk','merkController@index');
Route::get('admin/merk/formshow','merkController@formshow');
Route::post('admin/merk/store','merkController@store');
Route::get('admin/merk/update/{id}','merkController@update');
Route::put('admin/merk/update/{id}','merkController@update');
Route::get('admin/merk/destroy/{id}','merkController@destroy');

Route::get('admin/gambar','gambarController@index');
Route::get('admin/gambar/formshow','gambarController@formshow');
Route::post('admin/gambar/store','gambarController@store');
Route::get('admin/gambar/update/{id}','gambarController@update');
Route::put('admin/gambar/update/{id}','gambarController@update');
Route::get('admin/gambar/destroy/{id}','gambarController@destroy');


Route::get('admin/group','groupController@index');
Route::get('admin/group/formshow','groupController@formshow');
Route::post('admin/group/store','groupController@store');
Route::get('admin/group/update/{id}','groupController@update');
Route::put('admin/group/update/{id}','groupController@update');
Route::get('admin/group/destroy/{id}','groupController@destroy');

Route::get('admin/product','productController@index');
Route::get('admin/product/formshow','productController@formshow');
Route::post('admin/product/store','productController@store');
Route::get('admin/product/update/{id}','productController@update');
Route::put('admin/product/update/{id}','productController@update');
Route::get('admin/product/destroy/{id}','productController@destroy');

Route::get('/','storeController@displayHome');
Route::get('store/home','storeController@displayHome');
Route::get('store/product/{id}','storeController@displaySingleProduct');
Route::get('store/category/{id}','storeController@displayCategoryProduct');
Route::get('store/group/{id}','storeController@displayGroupProduct');
Route::get('store/merk/{id}','storeController@displayMerkProduct');
Route::get('store/diskon','storeController@displayDiskonProduct');
Route::get('store/addtocart/{id}','storeController@addToCart');
Route::get('store/viewcart','storeController@viewCart');
Route::get('store/deletecartitem/{id}','storeController@deleteCartItem');
Route::get('store/deletecart','storeController@deleteCart');
Route::get('store/ordercart','storeController@orderCart');
//Route::get('store/filter/{key}','storeController@displayCategoryProduct');
Route::get('store/carapesan','storeController@displayCaraPesan');
Route::get('store/faq','storeController@displayFAQ'); 
Route::get('store/about','storeController@displayAbout');
Route::get('store/search','storeController@searchResult')->name('search');

//-----------------------------------------------------------------------------------




