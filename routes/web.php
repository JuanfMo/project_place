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

Route::get('/', [
    'uses' => 'ProductController@getIndex',
    'as' => 'product.index'
]);

Route::get('/add-to-cart/{id}', [
    'uses' => 'ProductController@getAddToCart',
    'as' => 'product.addToCart'
]);

Route::get('/shopping-cart', [
    'uses' => 'ProductController@getCart',
    'as' => 'product.shoppingCart'
]);

Route::get('/shopping-cart', [
    'uses' => 'ProductController@getCart',
    'as' => 'product.shoppingCart'
]);

Route::get('/checkout', [
    'uses' => 'ProductController@getCheckout',
    'as' => 'checkout'
]);

Route::get('/buyers', [
    'uses' => 'BuyersController@showBuyers',
    'as' => 'buyers.showBuyers']);

Route::post('buyers', [
   'uses' => 'BuyersController@saveBuyers',
   'as' => 'buyers.save'
]);

Route::get('/delete-cart-one/{id}', [
    'uses' => 'ProductController@deleteOneCart',
    'as' => 'product.deleteOne'
]);

Route::get('/redirect/{id}', [
    'uses' => 'BuyersController@redirect',
    'as' => 'shop.redirect'
]);
