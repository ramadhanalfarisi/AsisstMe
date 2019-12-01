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

Route::get('', 'UserController@index')->name('home');
Route::get('assist-search', 'UserController@indexSecond')->name('search');
Route::get('assist-search-menu', 'UserController@indexSecondMenuSearch')->name('searchByMenu');
Route::get('assist-search-query', 'UserController@indexSecondQuerySearch')->name('searchByQuery');
Route::get('assist-search/{id}', 'UserController@indexSecondSearch')->name('searchByKategori');
Route::post('register', 'UserController@registerFirst')->name('register');
Route::post('register-2/{id}', 'UserController@registerSecond')->name('lengkapDocument');
Route::post('login', 'UserController@login');
Route::get('logout', 'UserController@logout')->name('logout');
Route::get('profile', 'UserController@indexProfile')->name('profile');
Route::get('request', 'UserController@indexRequest')->name('requestProfile');
Route::get('request/{id}/{status}', 'UserController@controlRequest')->name('requestAction');
Route::get('document', 'UserController@indexDocument')->name('documentProfile');
Route::post('document/update/{id}', 'UserController@updateDocument')->name('documentUpdate');

Route::post('hire/{id}', 'UserController@postRequest')->name('postRequest');

Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('user', 'AdminController@index')->name('adminUser');
    Route::post('rating/{id}', 'AdminController@postRating')->name('postRating');
    Route::post('edit-user/{id}', 'AdminController@editUser')->name('editUser');
    Route::get('delete-user/{id}', 'AdminController@deleteUser')->name('deleteUser');
});
Route::get('admin/login', 'AdminController@login')->name('login');
Route::post('admin/check', 'AdminController@checkLogin')->name('checkLogin');
Route::get('admin/logout', 'AdminController@logout')->name('adminLogout');