<?php

/*
|--------------------------------------------------------------------------
| Curator: Web Routes
|--------------------------------------------------------------------------
|
| Curator web routes.
|
*/

/*
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'App\Http\Controllers\HomeController@index');
**/

Route::group(['middleware' => ['web']], function () {
    //Route to Controller: CuratorController:Login
    Route::get('login', 'Curator\Controllers\LoginController@loginForm')->name('login');
    Route::post('login', 'Curator\Controllers\LoginController@login');
    Route::post('logout', 'Curator\Controllers\LoginController@logout')->name('logout');

    //Route to Controller: CuratorController:Dashboard.
    Route::get('dashboard', 'Curator\Controllers\DashboardController@Dashboard')->name('Dashboard');
});
