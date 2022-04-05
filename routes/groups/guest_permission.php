<?php
use Illuminate\Support\Facades\Route;

Route::get('login','Guest\AuthController@loginForm')->name('login');
Route::get('user_login','Guest\AuthController@user_login_form')->name('user_login');
Route::get('user_logout','Guest\AuthController@user_logout')->name('user_logout');
Route::post('login','Guest\AuthController@login')->name('login');
Route::post('user_login_post','Guest\AuthController@user_login_post')->name('user_login_post');
Route::get('register','Guest\AuthController@register')->name('register.index')->middleware('registration.permission');
Route::post('register/store','Guest\AuthController@storeUser')->name('register.store')->middleware('registration.permission');
Route::get('forget-password','Guest\AuthController@forgetPassword')->name('forget-password.index');
Route::post('forget-password/send-mail','Guest\AuthController@sendPasswordResetMail')->name('forget-password.send-mail');
Route::get('reset-password/{id}','Guest\AuthController@resetPassword')->name('reset-password.index');
Route::post('reset-password/{id}/update','Guest\AuthController@updatePassword')->name('reset-password.update');
Route::get('login/{social}','Guest\AuthController@socialLogin')->where('social','twitter|facebook|linkedin|google');
Route::get('login/{social}/callback','Guest\AuthController@handleProviderCallback')->where('social','twitter|facebook|linkedin|google');
