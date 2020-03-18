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

Route::group(['middleware' => ['auth'], 'prefix' => 'admin-panel'], function () {
    Route::get('/', 'DashboardController@index');
    Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
    Route::get('/analytics', 'DashboardController@analytics')->name('analytics');

    // Resource Routes
    Route::get('/user',  'UserController@index')->name('user.index');
    Route::get('/user/create',  'UserController@create')->name('user.create');
    Route::get('/user/show/{id}',  'UserController@show')->name('user.show');
    Route::get('/user/edit/{id}',  'UserController@edit')->name('user.edit');
    Route::get('/user/delete/{id}',  'UserController@destroy')->name('user.delete');
    Route::post('/user/store',  'UserController@store')->name('user.store');
    Route::post('/user/update/{id}',  'UserController@update')->name('user.update');
    Route::get('/profile',  'UserController@profile')->name('profile');
    Route::get('/profile/edit',  'UserController@edit_profile')->name('profile.edit');
    Route::post('/profile/update',  'UserController@update_profile')->name('profile.update');
    
    // Setting Route
    Route::get('setting', 'SettingController@edit')->name('setting.edit');
    Route::post('setting', 'SettingController@update')->name('setting.update');

    // Resource Routes
    Route::get('/route',  'Controller@index')->name('route.index');
    Route::get('/route/create',  'Controller@create')->name('route.create');
    Route::get('/route/show/{id}',  'Controller@show')->name('route.show');
    Route::get('/route/edit/{id}',  'Controller@edit')->name('route.edit');
    Route::get('/route/delete/{id}',  'Controller@destroy')->name('route.delete');
    Route::post('/route/store',  'Controller@store')->name('route.store');
    Route::post('/route/update/{id}',  'Controller@update')->name('route.update');
});
