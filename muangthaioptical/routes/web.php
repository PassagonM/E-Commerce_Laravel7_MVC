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
    $productshow = \App\productitem::all();
    return view('welcome', compact(['productshow']));
    // คิดอีกทีว่าจะไปสร้าง controller แทนดีมั้ย
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('profile', 'ProfileController')->middleware('auth');

Route::resource('product', 'ProductitemController')->middleware('auth');

Route::resource('viewall', 'showproductController');

Route::resource('basket', 'basketController')->middleware('auth');

Route::resource('order', 'OrderController')->middleware('auth');

Route::resource('makeorder', 'MakeOrderController')->middleware('auth');

Route::resource('reviews', 'ReviewsController')->middleware('auth');

Route::delete('/basketitem/{id}', 'basketController@deletebasketitem')->name('basketitem.delete');

// Route::post('images', 'ProfileController@store')->name('images.store');

Route::get('deladdress/{id}', 'ProfileController@editaddress')->name('del.address')->middleware('auth');

Route::get('checkaddress/{id}', 'ProfileController@usecheckaddress')->name('check.address')->middleware('auth');

Route::get('updateby/{id}', 'MakeOrderController@updatebycustomer')->name('updateby.customer')->middleware('auth');

Route::get('/search', 'showproductController@search');
