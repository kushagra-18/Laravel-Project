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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'PostController@index')->name('post');

    Route::post('/cart', 'CartController@store')->name('cart');

    Route::get('/cartItems', 'CartController@show')->name('cartItems');

    Route::get('/user', 'UserMetaController@showUserDetails')->name('user');

    Route::post('/cartItems', 'CartController@destroy')->name('cartItemsDelete');

    Route::get('/cart', 'CartController@index')->name('cartIndex');

    Route::get('/checkout/{id}', 'CartController@checkoutCart')->name('checkout');

    Route::post('/confirmOrder', 'UserController@checkoutCartFinal')->name('checkoutFinal');

    Route::get('/products/{id}', 'ProductPageController@index')->name('products');

    Route::get('/category/{category}', 'PostController@category')->name('category');

    Route::get('/category/{category}', 'PostController@category')->name('category');

    Route::get('/search', 'PostController@searchItems')->name('searchItems');

    Route::get('/category/{category}/{sort}', 'PostController@categorySort')->name('categorySort');

    Route::post('/rating', 'ProductPageController@rating')->name('rating');

    Route::post('/changePassword','HomeController@changePassword')->name('changePassword');

    Route::get('/changePassword', 'HomeController@showChangePasswordForm')->name('changePassword');
});

Route::group(['middleware' => ['auth', 'CheckCustomer']], function () {

    Route::get('/seller', 'SellerController@index')->name('sellerProduct');

    Route::get('/sellerView', 'SellerController@sellerView')->name('sellerView');

    Route::post('/sellerProduct', 'SellerController@addProduct')->name('addProduct');
});
