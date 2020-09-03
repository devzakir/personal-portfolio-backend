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

Route::get('/', 'DashboardController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin-panel'], function () {
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

    // product
    Route::resource('product', 'ProductController');
    Route::resource('product-category', 'ProductCategoryController');

    // portfolio
    Route::resource('portfolio', 'PortfolioController');
    Route::resource('portfolio-category', 'PortfolioCategoryController');

    // testimonial
    Route::resource('testimonial', 'TestimonialController');

    // Setting Route
    Route::get('setting', 'SettingController@edit')->name('setting.index');
    Route::post('setting', 'SettingController@update')->name('setting.update');

    // Contact route
    Route::resource('contact', 'ContactController');

    // Course route
    Route::resource('course', 'CourseController');
    Route::get('course/videos/{course}', 'CourseController@course_videos')->name('course.videos');
    Route::resource('course-category', 'CourseCategoryController');
    // Course Section
    Route::get('/course/{id}/section', 'CourseSectionController@index')->name('course.section.index');
    Route::get('/course/{id}/section/create', 'CourseSectionController@create')->name('course.section.create');
    Route::post('/course/{id}/section/store', 'CourseSectionController@store')->name('course.section.store');
    Route::get('/course/{id}/section/{sectionId}/edit', 'CourseSectionController@edit')->name('course.section.edit');
    Route::put('/course/{id}/section/{sectionId}/update', 'CourseSectionController@update')->name('course.section.update');
    Route::delete('/course/{id}/section/{sectionId}/delete', 'CourseSectionController@destroy')->name('course.section.destroy');

    // Course Video
    Route::get('/course/section/{id}/video', 'CourseVideoController@index')->name('course.video.index');
    Route::get('/course/section/{id}/video/create', 'CourseVideoController@create')->name('course.video.create');
    Route::post('/course/section/{id}/video/store', 'CourseVideoController@store')->name('course.video.store');
    Route::get('/course/section/{id}/video/{videoId}/edit', 'CourseVideoController@edit')->name('course.video.edit');
    Route::put('/course/section/{id}/video/{videoId}/update', 'CourseVideoController@update')->name('course.video.update');
    Route::delete('/course/section/{id}/video/{videoId}/delete', 'CourseVideoController@destroy')->name('course.video.destroy');

    // Route::resource('course-video', 'CourseVideoController');

    Route::resource('billing', 'BillingController');

    // Resource Routes
    Route::get('/route',  'Controller@index')->name('route.index');
    Route::get('/route/create',  'Controller@create')->name('route.create');
    Route::get('/route/show/{id}',  'Controller@show')->name('route.show');
    Route::get('/route/edit/{id}',  'Controller@edit')->name('route.edit');
    Route::get('/route/delete/{id}',  'Controller@destroy')->name('route.delete');
    Route::post('/route/store',  'Controller@store')->name('route.store');
    Route::post('/route/update/{id}',  'Controller@update')->name('route.update');

    // Order routes
    Route::resource('order', 'OrderController');
});
