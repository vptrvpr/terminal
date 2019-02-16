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

Route::get('/', 'PostController@index');
Route::get('/products/{campaignId}','ProductsController@getProductByCategory');
Route::get('/delete_product/{id}', 'ProductsController@deleteProduct');


/**
 * Products and Category
 */
Route::get('/get_categories','ProductsController@getCategoryAll');
Route::get('/get_products','ProductsController@getProductsAll');
Route::get('/get_recomended','ProductsController@getRecomended');



/**
 * Admin routes
 */
Route::get('/admin','AdminController@index');

/**
 * Cart
 */
Route::get('/cart','CartController@index');
Route::get('/cart_add/{id}','CartController@addCart');
Route::get('/cart_delete/{rowId}','CartController@deleteCart');
Route::get('/cart_info','CartController@getInfoCart');
Route::get('/cart_destroy','CartController@destroyCart');

/**
 * Rent
 */
Route::get('/rent','RentController@index');
Route::get('/about','PageController@aboutIndex');
Route::get('/contacts','PageController@contactsIndex');



