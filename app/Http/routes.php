<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//Route::get('/', 'WelcomeController@index');
//
//Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::post('ajax/login.php', '\App\Http\Controllers\Auth\AuthController@authenticate');
Route::post('ajax/register.php', '\App\Http\Controllers\Auth\AuthController@register');
Route::post('ajax/cart/add', 'CartController@addToCart');
Route::post('ajax/cart/update', 'CartController@updateCart');
Route::post('ajax/cart/delete', 'CartController@deleteFromCart');
Route::get('ajax/cart/getsmall', 'CartController@getSmallCart');
Route::get('ajax/cart/getbig', 'CartController@getBigCart');
Route::get('ajax/cart/getorder', 'CartController@getOrder');

Route::resource('blog', 'BlogController', ['as' => 'blog']);
Route::resource('aktsii', 'OffersController', ['as' => 'offers']);
Route::resource('brand', 'BrandsController', ['as' => 'brand']);


Route::get('catalog', ['as' => 'catalog', 'uses' => 'ProductsController@index']);
Route::get('catalog/{section}', ['as' => 'catalog_section', 'uses' => 'ProductsController@section']);
Route::get('catalog/{section}/{product}', ['as' => 'catalog_product', 'uses' => 'ProductsController@show']);
//
Route::get('/', ['as' => 'home', 'uses' => 'IndexController@index']);


Route::get('admin', ['as' => 'admin', 'uses' => 'AdminController@index']);
Route::get('admin/news', ['as' => 'admin_news', 'uses' => 'AdminController@indexNews']);
Route::delete('admin/news/{id}', 'AdminController@destroyNews');
Route::get('admin/news/create', ['as' => 'admin_news_create', 'uses' => 'AdminController@createNews']);
Route::post('admin/news/create', ['as' => 'admin_news_store', 'uses' => 'AdminController@storeNews']);
Route::get('admin/news/{id}/edit', ['as' => 'admin_news_edit', 'uses' => 'AdminController@editNews']);
Route::put('admin/news/{id}/edit', ['as' => 'admin_news_update', 'uses' => 'AdminController@updateNews']);

Route::get('admin/offers', ['as' => 'admin_offers', 'uses' => 'AdminController@indexOffers']);
Route::delete('admin/offers/{id}', 'AdminController@destroyOffers');
Route::get('admin/offers/create', ['as' => 'admin_offers_create', 'uses' => 'AdminController@createOffers']);
Route::post('admin/offers/create', ['as' => 'admin_offers_store', 'uses' => 'AdminController@storeOffers']);
Route::get('admin/offers/{id}/edit', ['as' => 'admin_offers_edit', 'uses' => 'AdminController@editOffers']);
Route::put('admin/offers/{id}/edit', ['as' => 'admin_offers_update', 'uses' => 'AdminController@updateOffers']);


Route::get('admin/brands', ['as' => 'admin_brands', 'uses' => 'AdminController@indexBrands']);
Route::delete('admin/brands/{id}', 'AdminController@destroyBrands');
Route::get('admin/brands/create', ['as' => 'admin_brands_create', 'uses' => 'AdminController@createBrands']);
Route::post('admin/brands/create', ['as' => 'admin_brands_store', 'uses' => 'AdminController@storeBrands']);
Route::get('admin/brands/{id}/edit', ['as' => 'admin_brands_edit', 'uses' => 'AdminController@editBrands']);
Route::put('admin/brands/{id}/edit', ['as' => 'admin_brands_update', 'uses' => 'AdminController@updateBrands']);

Route::get('admin/sections', ['as' => 'admin_sections', 'uses' => 'AdminController@indexSections']);
Route::delete('admin/sections/{id}', 'AdminController@destroySections');
Route::get('admin/sections/create', ['as' => 'admin_sections_create', 'uses' => 'AdminController@createSections']);
Route::post('admin/sections/create', ['as' => 'admin_sections_store', 'uses' => 'AdminController@storeSections']);
Route::get('admin/sections/{id}/edit', ['as' => 'admin_sections_edit', 'uses' => 'AdminController@editSections']);
Route::put('admin/sections/{id}/edit', ['as' => 'admin_sections_update', 'uses' => 'AdminController@updateSections']);


Route::get('admin/products', ['as' => 'admin_products', 'uses' => 'AdminController@indexProducts']);
Route::delete('admin/products/{id}', 'AdminController@destroyProducts');
Route::get('admin/products/create', ['as' => 'admin_products_create', 'uses' => 'AdminController@createProducts']);
Route::post('admin/products/create', ['as' => 'admin_products_store', 'uses' => 'AdminController@storeProducts']);
Route::get('admin/products/{id}/edit', ['as' => 'admin_products_edit', 'uses' => 'AdminController@editProducts']);
Route::put('admin/products/{id}/edit', ['as' => 'admin_products_update', 'uses' => 'AdminController@updateProducts']);


Route::get('admin/sizes', ['as' => 'admin_sizes', 'uses' => 'AdminController@indexSizes']);
Route::delete('admin/sizes/{id}', 'AdminController@destroySizes');
Route::get('admin/sizes/create', ['as' => 'admin_sizes_create', 'uses' => 'AdminController@createSizes']);
Route::post('admin/sizes/create', ['as' => 'admin_sizes_store', 'uses' => 'AdminController@storeSizes']);
Route::get('admin/sizes/{id}/edit', ['as' => 'admin_sizes_edit', 'uses' => 'AdminController@editSizes']);
Route::put('admin/sizes/{id}/edit', ['as' => 'admin_sizes_update', 'uses' => 'AdminController@updateSizes']);


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
