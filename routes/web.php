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
    Route::post('/location-store','LocationController@store')->name('location-store');
    
    Route::get('/vendor','VendorController@index');
    Route::get('/vendor-create','VendorController@indexcreate');
    Route::get('/vendor-reject','VendorController@indexreject');
    Route::post('/individual-store','VendorController@individualstore')->name('individual-store');
    Route::post('/business-store','VendorController@businessstore')->name('business-store');
    Route::post('/allbusiness-store','VendorController@allbusinessstore')->name('allbusiness-store');
    Route::post('/allindividual-store','VendorController@allindividualstore')->name('allindividual-store');
    Route::get('/vendor-edit/{id}','VendorController@edit');
    Route::put('/vendor-update/{id}','VendorController@update');
    Route::put('/vendor-reject/{id}','VendorController@rejectvendor');
    Route::put('/vendor-created/{id}','VendorController@createvendor');

    Route::get('/asset','AssetController@index');



    Route::get('/servicerequests','ServicrequestController@index');

    Route::resource('products','ProductController');
});
