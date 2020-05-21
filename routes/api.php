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

Route::get('/setting', 'ApiController@setting');
Route::get('/portfolio', 'ApiController@portfolio');
Route::get('/testimonial', 'ApiController@testimonial');
Route::post('/contact', 'ApiController@contact');

Route::get('/products', 'ApiController@products');
Route::get('/product/{slug}', 'ApiController@product_details');