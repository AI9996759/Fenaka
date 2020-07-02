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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('roles-update','RoleController');

    Route::resource('users','UserController');
    Route::resource('users-update','UserController');

    Route::get('/location','LocationController@index');
    
    Route::get('/vendor','VendorController@index');
    Route::post('/individual-store','VendorController@individualstore')->name('individual-store');

    Route::resource('products','ProductController');
});
