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
Route::post('register', 'UserController@registerFirst');
Route::post('register-2/{id}', 'UserController@registerSecond');
Route::post('login', 'UserController@login');
Route::get('logout', 'UserController@logout')->name('logout');

Route::get('/add', function(){
    return view('add_kategori');
});

Route::get('/edit', function(){
    return view('edit_kategori');
});

Route::get('/detail', function(){
    return view('detail_kategori');
});

Route::get('/2', function () {
    return view('user.second');
});