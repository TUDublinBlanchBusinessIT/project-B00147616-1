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


Route::resource('customers', App\Http\Controllers\customerController::class);
Route::get('/customers/new', 'App\Http\Controllers\CustomerController@new');
Route::post('/customers/create', 'App\Http\Controllers\CustomerController@create')->name('customers.create');


Route::resource('products', App\Http\Controllers\productController::class);


Route::resource('bouquets', App\Http\Controllers\bouquetController::class);


Route::resource('orders', App\Http\Controllers\ordersController::class);

/** route to display images */
Route::get('product/displaygrid', 'App\Http\Controllers\productController@displaygrid')->name('products.displaygrid');

/** route to add item in navbar */
Route::get('product/additem/{id}', 'App\Http\Controllers\productController@additem')->name('products.additem');

/** route to empty cart in navbar */
Route::get('product/emptycart', 'App\Http\Controllers\productController@emptycart')->name('products.emptycart');

/** route to for checkout cart */
Route::get('order/checkout', 'App\Http\Controllers\ordersController@checkout')->name('orders.checkout');

/** route to for checkout form */
Route::post('order/placeorder', 'App\Http\Controllers\ordersController@placeorder')->name('orders.placeorder');
