<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['namespace'=>'Api'],function(){
	Route::post('register','MainControllers@register');
    Route::post('login','MainControllers@login');
    Route::get('categories','MainControllers@categories');
    Route::get('products','MainControllers@products');

    Route::group(['middleware'=>'auth:api'],function(){
    Route::get('myfavourites-products','MainControllers@myFavouritesProduct');
    Route::post('products-favourite','MainControllers@FavouritesProduct');
});

});
