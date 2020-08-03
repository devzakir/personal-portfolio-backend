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
Route::group([ 'middleware' => 'api', 'prefix' => 'auth' ], function ($router) {
    Route::post('login', 'ApiAuthController@login');
    Route::post('logout', 'ApiAuthController@logout');
    Route::post('refresh', 'ApiAuthController@refresh');
    Route::get('me', 'ApiAuthController@me');
    Route::post('register', 'ApiAuthController@register');
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/setting', 'ApiController@setting');
Route::get('/portfolio', 'ApiController@portfolio');
Route::get('/testimonial', 'ApiController@testimonial');
Route::post('/contact', 'ApiController@contact');

Route::get('/products', 'ApiController@products');
Route::get('/product/{slug}', 'ApiController@product_details');

Route::get('/courses', 'ApiController@courses');
Route::get('/course/{slug}', 'ApiController@course');

Route::post('purchase', 'ApiController@purchase');