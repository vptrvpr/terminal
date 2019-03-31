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
Route::get('/products/{campaignId}', 'ProductsController@getProductByCategory');
Route::get('/delete_product/{id}', 'ProductsController@deleteProduct');
Route::get('/get_form_new_product/', 'ProductsController@getFormNewProduct');



/**
 * Products and Category
 */
Route::get('/get_categories', 'ProductsController@getCategoryAll');
Route::get('/get_products', 'ProductsController@getProductsAll');
Route::get('/get_recomended', 'ProductsController@getRecomended');
Route::post('/save_categories', 'ProductsController@saveCategories');
Route::get('/delete_categories/{categoryId}', 'ProductsController@deleteCategories');

Route::post('/product/changes_save','ProductsController@productChangesSave');
Route::post('/product/update_img', 'ProductsController@productEditLoadImage');
Route::post('/product/save_new_product', 'ProductsController@saveNewProduct');
Route::get('/catalog/category/{categoryId}','ProductsController@categoryPage');
Route::get('/catalog/category/product/{productId}','ProductsController@showProduct');
Route::get('/get-product-by-id/{productId}','ProductsController@getProductById');
Route::get('/get_categories_by_id/{categoryId}','ProductsController@getCategoryById');


/**
 * Admin routes
 */
Route::get('/admin', 'AdminController@index');
Route::get('/admin/products/','AdminController@adminProducts');
Route::get('/admin/partners/','AdminController@adminPartners');
Route::get('/admin/slider/','AdminController@adminSliders');
Route::get('/admin/recommended/','AdminController@adminRecommendeds');
Route::get('/admin/get_categories/','AdminController@getCategories');
/**
 * Cart
 */
Route::get('/cart', 'CartController@index');
Route::get('/cart_add/{id}', 'CartController@addCart');
Route::get('/cart_delete/{rowId}', 'CartController@deleteCart');
Route::get('/cart_info', 'CartController@getInfoCart');
Route::get('/cart_destroy', 'CartController@destroyCart');

/**
 * Rent
 */
Route::get('/rent', 'RentController@index');
Route::get('/about', 'PageController@aboutIndex');
Route::get('/contacts', 'PageController@contactsIndex');


/**
 * FZ54
 */
Route::get('/fz-54', 'PageController@fz54Index');
Route::get('/sofd', 'PageController@sofdIndex');
Route::get('/kassovye-apparaty-s-2019-goda', 'PageController@kas2gIndex');
Route::get('/kak-zaregistrirovat-onlayn-kassu-v-nalogovoy', 'PageController@kzokvn');
Route::get('/perekhod-na-ffd-1-05-i-nds-20-atol-shtrikh-m-viki-print', 'PageController@pnf');
Route::get('/novye-objazatelnye-rekvizity-chekov-kkt-i-bso', 'PageController@novyeObjazatelnyeRekvizityChekovKktIBso');
Route::get('/onlayn-kassy-dlya-ip-na-envd-i-psn-otsrochka-do-2021-goda', 'PageController@onlaynKassyDlyaIpNaEnvdIPsnOtsrochkaDo2021Goda');
Route::get('/nalogovyj-vychet-za-onlajn-kassu', 'PageController@nalogovyjVychetZaOnlajnKassu');
Route::get('/komu-nuzhno-stavit-kassovyj-apparat', 'PageController@komuNuzhnoStavitKassovyjApparat');
Route::get('/kak-snyat-s-ucheta-online-kassu', 'PageController@kakSnyatSUchetaOnlineKassu');


/**
 * Helper
 */
Route::post('/helper/load_image', 'HelperController@loadImage');
Route::post('/helper/load-image-universal', 'HelperController@loadImageUniversal');
Route::get('/helper/get-url-site', 'HelperController@getUrlSite');


/**
 * Partners
 */
Route::post('/partners/save', 'PartnersController@save');
Route::post('/partners/delete', 'PartnersController@delete');
Route::get('/partners/get', 'PartnersController@get');


/**
 * Sliders
 */
Route::post('/sliders/save', 'SliderController@save');
Route::post('/sliders/delete', 'SliderController@delete');
Route::get('/sliders/get', 'SliderController@get');


/**
 * Recommended
 */
Route::post('/recommended/save', 'RecommendedController@save');
Route::post('/recommended/delete', 'RecommendedController@delete');
Route::get('/recommended/get', 'RecommendedController@get');
Route::get('/recommended/page/get', 'RecommendedController@getPage');


/**
 * Slack notifications
 */
Route::post('/slack/order_send', 'SlackController@sendOrder');
Route::post('/slack/contact_send', 'SlackController@sendContact');

