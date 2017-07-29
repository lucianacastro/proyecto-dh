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

Route::get('/', 'LoginController@showForm');
Route::get('/login', 'LoginController@showForm');
Route::post('/login', 'LoginController@showForm');
Route::get('/register', 'RegisterController@showForm');
Route::post('/register', 'RegisterController@showForm');
Route::post('/logout', 'LoginController@logout');

Route::get('/success', function () {
    return view('success', ['session' => SessionHelper::getInstance(), 'db' => DB::getInstance()]);
});

Route::get('/faq', function () {
    return view('faq', ['session' => SessionHelper::getInstance(), 'db' => DB::getInstance(), 'body_class' => 'body-faqs']);
});

Route::get('/happiness', function () {
    return view('happiness', ['session' => SessionHelper::getInstance(), 'db' => DB::getInstance()]);
});

Route::get('/user-count', 'JsonController@userCount');

Route::get('/user-availability', 'JsonController@userAvailability');