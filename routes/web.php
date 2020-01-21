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
/* Frontend */

Route::get('/', 'FrontendController@getHomePage');
Auth::routes(['verify' => true]);

//Route::get('/{catchall?}', 'FrontendController@getHomePage')->where('catchall', '^(?!admin).*$', '^(?!api).*$', '^(?!email).*$')->name('administration');

// ** Backend ** 
// Authentication Routes...
Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('admin/login', 'Auth\LoginController@login');
Route::post('admin/logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('admin/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('admin/register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('admin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
 Route::post('admin/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('admin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('admin/password/reset', 'Auth\ResetPasswordController@reset');

// ** Main Frontend Controller //
Route::group(['prefix' => 'api'], function() {
    Route::get('/user', 'Frontend\MainController@index');
});

// ** Admin User Root Route //
Route::group(['middleware' => 'verified', 'prefix' => 'admin'], function() {
    Route::get('profile', 'Backend\UserControlPanelController@index')->name('Profile');
});

// ** Admin User API Route //
Route::group(['middleware' => 'verified', 'prefix' => 'api/user/'], function() {
    Route::put('show/{id}', 'Backend\UserControlPanelController@show');
    Route::put('update/{id}', 'Backend\UserControlPanelController@update');
});

// ** Portfolio Admin Routes //
Route::group(['middleware' => 'verified', 'prefix' => 'admin/portfolio'], function() {
    Route::get('/', 'Backend\PortfolioController@index')->name('Portfolio');
    Route::get('add', 'Backend\PortfolioController@create')->name('Add Portfolio Entry');
    Route::get('edit/{id}','Backend\PortfolioController@edit')->name('Edit Portfolio Entry');
});

// ** Portfolio API Routes //
Route::group(['middleware' => 'verified', 'prefix' => 'api/portfolio'], function() {
    Route::post('store', 'Backend\PortfolioController@store');
    Route::put('update/{id}', 'Backend\PortfolioController@update');
    Route::delete('destroy/{id}', 'Backend\PortfolioController@destroy');
});


// ** Blog Admin Routes //
Route::group(['middleware' => 'verified', 'prefix' => 'admin/blog'], function() {
    Route::get('/', 'Backend\BlogController@index')->name('Blog');
    Route::get('add', 'Backend\BlogController@create')->name('Add Post');
    Route::get('edit/{id}','Backend\BlogController@edit')->name('Edit Post');
});
// ** Blog API Routes //
Route::group(['middleware' => 'verified', 'prefix' => 'api/blog'], function() {
    Route::post('store', 'Backend\BlogController@store');
    Route::put('update/{blog_post_id}', 'Backend\BlogController@update');
    Route::delete('destroy/{blog_post_id}', 'Backend\BlogController@destroy');

});


Route::post('upload-cropped-image', 'HelperMethodsController@uploadCroppedImage');
