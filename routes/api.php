<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// account logins
Route::group([ 'middleware' => 'api', 'prefix' => 'auth' ], function ($router) {
    Route::post('login', 'ApiAuthController@login');
    Route::post('logout', 'ApiAuthController@logout');
    Route::post('refresh', 'ApiAuthController@refresh');
    Route::get('me', 'ApiAuthController@me');
    Route::post('register', 'ApiAuthController@register');
});

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('auth/courses', 'ApiController@auth_courses');
    Route::post('auth/update', 'ApiAuthController@update_user');

    // checkout page
    Route::post('purchase', 'ApiController@purchase');
    Route::post('unlock-course', 'ApiController@unlock_course');

    // Course Watch Page
    Route::get('course/access/{slug}', 'ApiController@course_access');
    Route::get('watch/{course}/{slug}', 'ApiController@lesson_data');
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
