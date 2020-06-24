<?php

Route::namespace ('Admin')->group(function () {
    Route::get('/login', 'LoginController@showLoginForm');
    Route::post('/login', 'LoginController@login')->name('admin.login');
    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/', 'HomeController@index');
        Route::get('/logout', 'LoginController@logout')->name('admin.logout');
    });
    // Admin password reset
    Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
    Route::get('/Change/Password', 'AdminController@ChangePassword')->name('admin.password.change');
    Route::post('/password/update', 'AdminController@Update_pass')->name('admin.password.update');
});
