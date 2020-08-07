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

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('auth/courses', 'ApiController@auth_courses');
});

// home page
Route::get('/setting', 'ApiController@setting');
Route::get('/portfolio', 'ApiController@portfolio');
Route::get('/testimonial', 'ApiController@testimonial');
Route::post('/contact', 'ApiController@contact');

// products page
Route::get('/products', 'ApiController@products');
Route::get('/product/{slug}', 'ApiController@product_details');

// course page
Route::get('/courses', 'ApiController@courses');
Route::get('/course/{slug}', 'ApiController@course');

// checkout page
Route::post('purchase', 'ApiController@purchase');
Route::post('unlock-course', 'ApiController@unlock_course');