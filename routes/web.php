<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('shop', 'ShopController');
Route::resource('reserve', 'ReserveController');
Route::resource('tag', 'TagController');

Route::get('/customer/{id}/home', 'CustomerController@home');
Route::post('/customer/{id}/searchResult', 'CustomerController@showSearchResult');
Route::get('/customer/{id}/shop/{shop_id}', 'CustomerController@showShopDetail');
Route::get('/customer/{id}/reserve/{shop_id}', 'CustomerController@showReservePage');
Route::post('/customer/{id}/reserve/{shop_id}', 'CustomerController@reserve');


Route::get('/clerk/{id}/home', 'ClerkController@home');
Route::get('/clerk/{id}/searchReserve', 'ClerkController@shopReserve');
Route::get('/clerk/{id}/shopCreate', 'ClerkController@shopCreate');
Route::post('/clerk/{id}/shopStore', 'ClerkController@shopStore');

Route::get('/admin/{id}/home', 'AdminController@home');
Route::post('/admin/{id}/findReserve', 'AdminController@findReserveByShopId');
Route::post('/admin/{id}/destroyReserve', 'AdminController@destroyReserve');
Route::post('/admin/{id}/userEdit', 'AdminController@userEdit');
Route::post('/admin/{id}/userUpdate', 'AdminController@userUpdate');
Route::post('/admin/{id}/userDelete', 'AdminController@userDelete');
Route::get('/admin/{id}/createTag', 'AdminController@createTag');
Route::post('/admin/{id}/storeTag', 'AdminController@storeTag');
