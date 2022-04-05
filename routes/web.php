<?php

use Illuminate\Support\Facades\Route;

//Test
//Route::get('test/{id?}', 'TestController@test')->name('test');
//Route::post('tests', 'TestController@testPost')->name('testpost');

Route::get('/', 'Common\HomeController@index')->name('home');
Route::get('/autocomplete/fetch', 'Common\HomeController@fetch')->name('autocomplete.fetch');
Route::get('/autocomplete/package_tour', 'Common\HomeController@package_tour')->name('autocomplete.package_tour');
Route::get('/autocomplete/from_where_area', 'Common\HomeController@from_where_area')->name('autocomplete.from_where_area');
Route::get('/autocomplete/going_to_area', 'Common\HomeController@going_to_area')->name('autocomplete.going_to_area');
Route::get('/autocomplete/starting_point_bus', 'Common\HomeController@starting_point_bus')->name('autocomplete.starting_point_bus');
Route::get('/autocomplete/ending_point_bus', 'Common\HomeController@ending_point_bus')->name('autocomplete.ending_point_bus');
Route::get('/autocomplete/venue_search', 'Common\HomeController@venue_search')->name('autocomplete.venue_search');
Route::post('search_result', 'Common\HomeController@search_result')->name('search_result');
Route::get('/hotel_list', 'Common\HomeController@hotel_list')->name('hotel_list');
Route::get('/hotel_search_list', 'Common\HomeController@hotel_search_list')->name('hotel_search_list');
Route::get('/hotel_details/{id}', 'Common\HomeController@hotel_details')->name('hotel_details');
Route::get('/package_tour_list', 'Common\HomeController@package_tour_list')->name('package_tour_list');
Route::get('/package_tour_details/{id}', 'Common\HomeController@package_tour_details')->name('package_tour_details');
Route::get('/venue_list', 'Common\HomeController@venue_list')->name('venue_list');
Route::get('/venue_details/{id}', 'Common\HomeController@venue_details')->name('venue_details');
Route::get('/rent_a_car_list', 'Common\HomeController@rent_a_car_list')->name('rent_a_car_list');
Route::get('/rent_a_car_details/{id}', 'Common\HomeController@rent_a_car_details')->name('rent_a_car_details');
Route::get('/bus_list', 'Common\HomeController@bus_list')->name('bus_list');
Route::get('/bus_details/{id}', 'Common\HomeController@bus_details')->name('bus_details');
Route::get('/visa_list', 'Common\HomeController@visa_list')->name('visa_list');
Route::get('/visa_details/{id}', 'Common\HomeController@visa_details')->name('visa_details');
Route::get('/book_now/{id}/{type}', 'Common\HomeController@book_now')->name('book_now');
Route::get('/booking_payment', 'Common\HomeController@booking_payment')->name('booking_payment');
Route::get('generate_otp', 'Common\HomeController@generate_otp')->name('generate_otp');
Route::post('register_user', 'Common\HomeController@register_user')->name('register_user');
Route::post('confirm_booking', 'Common\HomeController@confirm_booking')->name('confirm_booking');
Route::get('booking_payment', 'Common\HomeController@booking_payment')->name('booking_payment');
Route::get('booking_confirm', 'Common\HomeController@booking_confirm')->name('booking_confirm');
Route::get('bookings', 'Common\HomeController@bookings')->name('bookings');
/*Route::prefix('install')
    ->name('installer.')
    ->middleware('install')
    ->group(function () {
        Route::get('setup/superadmin', 'SuperadminController')->name('superadmin');
        Route::post('setup/superadmin', '')->name('superadmin');
    });*/
