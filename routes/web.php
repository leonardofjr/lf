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

Route::get('/{catchall?}', 'FrontendController@getHomePage')->where('catchall', '^(?!admin).*$', '^(?!api).*$')->name('administration');

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


Route::group(['middleware' => 'verified', 'prefix' => 'admin'], function() {

    // ** Page Routes //
    Route::get('settings', 'AdminUserControlPanel@getSettingsPage')->name('User Settings');
    Route::get('skills', 'AdminUserControlPanel@getSkillsPage')->name('Edit Skills');
    Route::get('portfolio', 'AdminUserControlPanel@getPortfolioPage')->name('Portfolio Entries');
    Route::get('portfolio/edit/{id}','AdminUserControlPanel@getEditPortfolioPage')->name('Edit Portfolio Entry');
    Route::get('portfolio/add', 'AdminUserControlPanel@getAddPortfolioEntryPage')->name('Add Portfolio Entry');
});