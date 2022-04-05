<?php

Route::prefix('v1')->group(function(){
   Route::post('login', 'Api\AuthController@login');
   Route::post('register', 'Api\AuthController@register');
   Route::group(['middleware' => 'auth:api'], function(){
     Route::post('getUser', 'Api\AuthController@getUser');
   });
});
