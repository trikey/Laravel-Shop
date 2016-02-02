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


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
