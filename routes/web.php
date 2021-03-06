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
Route::get('logout',function () {
  auth()->guard()->logout();
  return redirect('login');
});
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::resource('categores','CategoryController');
Route::resource('product','ProductController');

