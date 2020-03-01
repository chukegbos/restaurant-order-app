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
Auth::routes();
Route::get('/', 'TestController@index')->name('home');
Route::get('/menu', 'TestController@menu')->name('menu');
Route::get('/about', 'TestController@about')->name('about');
Route::get('/contact', 'TestController@contact')->name('contact');
//Route::get('/login', 'TestController@login')->name('login');

//Route::post('/stafflogin', 'TestController@stafflogin')->name('stafflogin');
//Route::post('/log', 'HomeController@log')->name('logout');
//Route::get('/login', 'Auth/LoginController@login')->name('login');


Route::get('/sliders', 'HomeController@sliders')->name('sliders');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/category', 'HomeController@category')->name('category');
Route::post('/storeuser', 'HomeController@storeuser')->name('storeuser');
Route::post('/category', 'HomeController@storecategory')->name('storecategory');
Route::delete('/deletecategory/{id}', 'HomeController@deletecategory')->name('deletecategory');

Route::get('/bar', 'HomeController@bar')->name('bar');
Route::post('/bar', 'HomeController@storebar')->name('storebar');
Route::post('/updatebar', 'HomeController@updatebar')->name('updatebar');
Route::post('/updateuser', 'HomeController@updateuser')->name('updateuser');
Route::delete('/deletebar/{id}', 'HomeController@deletebar')->name('deletebar');

Route::get('/product', 'HomeController@product')->name('product');
Route::post('/product', 'HomeController@storeproduct')->name('storeproduct');
Route::post('/updateproduct', 'HomeController@updateproduct')->name('updateproduct');
Route::post('/storepackage', 'HomeController@storepackage')->name('storepackage');
Route::delete('/deleteproduct/{id}', 'HomeController@deleteproduct')->name('deleteproduct');

Route::get('/supplier', 'HomeController@supplier')->name('supplier');
Route::post('/supplier', 'HomeController@storesupplier')->name('storesupplier');
Route::post('/updatesupplier', 'HomeController@updatesupplier')->name('updatesupplier');
Route::delete('/deletesupplier/{id}', 'HomeController@deletesupplier')->name('deletesupplier');

Route::get('/purchase', 'HomeController@purchase')->name('purchase');
Route::post('/purchase', 'HomeController@storepurchase')->name('storepurchase');
Route::post('/updatepurchase', 'HomeController@updatepurchase')->name('updatepurchase');
Route::delete('/deletepurchase/{id}', 'HomeController@deletepurchase')->name('deletepurchase');

Route::get('/addcart/{id}', 'TestController@addcart')->name('product.addToCart');
Route::get('/reduce/{id}', 'TestController@getReduceByOne')->name('product.reduceByOne');
Route::get('/remove/{id}', 'TestController@getRemoveItem')->name('product.remove');
Route::get('/shop/shoppingcart', 'HomeController@shoppingcart5')->name('shoppingcart');
Route::post('/shoppingcart1', 'HomeController@checkout1')->name('checkout1');
Route::get('/shoppingcart2', 'HomeController@checkout2')->name('checkout2');

Route::post('/changestatus', 'HomeController@changestatus')->name('changestatus');

Route::get('/shoppingcart', 'HomeController@shoppingcart')->name('shoppingcart');
Route::post('/shoppingcart', 'HomeController@checkout')->name('checkout');
Route::get('/orders', 'HomeController@orders')->name('orders');
Route::get('/vieworders', 'HomeController@vieworders')->name('vieworders');

Route::get('/setting', 'HomeController@setting')->name('setting');
Route::post('/setting', 'HomeController@storesetting')->name('storesetting');


Route::get('/store', 'HomeController@store')->name('store');
Route::get('/attendants', 'HomeController@attendants')->name('attendants');

Route::get('/password', 'HomeController@passwordget')->name('passwordget');
Route::post('/password', 'HomeController@password')->name('changepassword');


Route::get('/shop/dashboard', 'HomeController@userdashboard')->name('userdashboard');