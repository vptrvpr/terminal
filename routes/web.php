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
Route::get('/fz-54', 'PageController@fz54Index');
Route::get('/sofd', 'PageController@sofdIndex');
Route::get('/kassovye-apparaty-s-2019-goda', 'PageController@kas2gIndex');
Route::get('/kak-zaregistrirovat-onlayn-kassu-v-nalogovoy', 'PageController@kzokvn');
Route::get('/perekhod-na-ffd-1-05-i-nds-20-atol-shtrikh-m-viki-print', 'PageController@pnf');
Route::get('/novye-objazatelnye-rekvizity-chekov-kkt-i-bso', 'PageController@nor');



