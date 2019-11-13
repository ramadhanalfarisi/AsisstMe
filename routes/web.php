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
    return view('home');  
});

Route::get('/admin', function () {
    return view('dashboard');
});

Route::get('/add', function(){
    return view('add_kategori');
});

Route::get('/edit', function(){
    return view('edit_kategori');
});

Route::get('/detail', function(){
    return view('detail_kategori');
});
