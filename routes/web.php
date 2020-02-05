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

Route::get('/', 'FrontendController@getHomePage')->name('Home');
Auth::routes(['verify' => true, 'register' => false]);

//Route::get('/{catchall?}', 'FrontendController@getHomePage')->where('catchall', '^(?!admin).*$', '^(?!api).*$', '^(?!email).*$')->name('administration');


// ** Main Frontend Controller //
Route::group(['prefix' => 'api'], function() {
    Route::get('/user', 'Frontend\MainController@index');
    Route::post('/mail', 'MailController@sendMail');
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

// ** Users Admin Routes //
Route::group(['middleware' => ['verified', 'roles'],'roles' => ['admin'], 'prefix' => 'admin/users'], function() {
    Route::get('/', 'Backend\UsersController@index')->name('Users');
    Route::get('add', 'Backend\UsersController@create')->name('Add User');
    Route::get('edit/{id}','Backend\UsersController@edit')->name('Edit User');
});

// ** Users API Routes //
Route::group(['middleware' => 'verified', 'prefix' => 'api/users'], function() {
    Route::post('store', 'Backend\UsersController@store');
    Route::put('update/{id}', 'Backend\UsersController@update');
    Route::delete('destroy/{id}', 'Backend\UsersController@destroy');
});


// ** Portfolio Admin Routes //
Route::group(['middleware' => 'verified', 'prefix' => 'admin/portfolio'], function() {
    Route::get('/', 'Backend\PortfolioController@index')->name('Portfolio');
    Route::get('add', 'Backend\PortfolioController@create')->name('Add Project');
    Route::get('edit/{id}','Backend\PortfolioController@edit')->name('Edit Project');
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
