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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/admin/subscriptions', '\App\Http\Controllers\Admin\SubscriptionsCrudController');



Route::get('/login', '\App\Http\Controllers\UsersController@login');
Route::get('/register', '\App\Http\Controllers\RegisterController@register');
Route::get('/subscriptions', '\App\Http\Controllers\UsersController@subscriptions');
Route::get('/subscribe', '\App\Http\Controllers\UsersController@subscribe');
Route::get('/unsubscribe', '\App\Http\Controllers\UsersController@unSubscribe');
Route::get('/check/subscription', '\App\Http\Controllers\UsersController@checkSubscription');
Route::get('/estimates', '\App\Http\Controllers\EstimatesController@estimates');
Route::get('/estimates/played', '\App\Http\Controllers\EstimatesController@played');
Route::get('/estimates/waiting', '\App\Http\Controllers\EstimatesController@waiting');
