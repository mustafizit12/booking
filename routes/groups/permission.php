<?php

require_once ('permission/core.php');
Route::resource('areas', 'Area\AreaController')->parameter('areas','id');
Route::resource('hotels', 'Hotel\HotelController')->parameter('hotels','id');
Route::get('hotels/getAgent/{id}', 'Hotel\HotelController@getAgent')->name('hotels.getAgent');
Route::get('hotel_pending_reservation', 'Hotel\HotelController@hotel_pending_reservation')->name('hotel_pending_reservation');
Route::get('hotel_approved_reservation', 'Hotel\HotelController@hotel_approved_reservation')->name('hotel_approved_reservation');
Route::get('hotel_complete_reservation', 'Hotel\HotelController@hotel_complete_reservation')->name('hotel_complete_reservation');
Route::get('hotel_rejected_reservation', 'Hotel\HotelController@hotel_rejected_reservation')->name('hotel_rejected_reservation');
Route::get('reservation_approved/{id}/{type}', 'Hotel\HotelController@reservation_approved')->name('reservation_approved');
Route::get('reservation_reject/{id}/{type}', 'Hotel\HotelController@reservation_reject')->name('reservation_reject');
Route::resource('rooms', 'Room\RoomController')->parameter('rooms','id');
Route::resource('buss', 'Bus\BusController')->parameter('buss','id');
Route::get('bus_pending_reservation', 'Bus\BusController@bus_pending_reservation')->name('bus_pending_reservation');
Route::get('bus_approved_reservation', 'Bus\BusController@bus_approved_reservation')->name('bus_approved_reservation');
Route::get('bus_complete_reservation', 'Bus\BusController@bus_complete_reservation')->name('bus_complete_reservation');
Route::get('bus_rejected_reservation', 'Bus\BusController@bus_rejected_reservation')->name('bus_rejected_reservation');

Route::resource('rentCars', 'RentCar\RentCarController')->parameter('rentCars','id');
Route::get('rentCar_pending_reservation', 'RentCar\RentCarController@rentCars_pending_reservation')->name('rentCar_pending_reservation');
Route::get('rentCar_approved_reservation', 'RentCar\RentCarController@rentCars_approved_reservation')->name('rentCar_approved_reservation');
Route::get('rentCar_complete_reservation', 'RentCar\RentCarController@rentCars_complete_reservation')->name('rentCar_complete_reservation');
Route::get('rentCar_rejected_reservation', 'RentCar\RentCarController@rentCars_rejected_reservation')->name('rentCar_rejected_reservation');

Route::resource('tourPackages', 'TourPackage\TourPackageController')->parameter('tourPackages','id');
Route::get('tourPackage_pending_reservation', 'TourPackage\TourPackageController@tourPackage_pending_reservation')->name('tourPackage_pending_reservation');
Route::get('tourPackage_approved_reservation', 'TourPackage\TourPackageController@tourPackage_approved_reservation')->name('tourPackage_approved_reservation');
Route::get('tourPackage_complete_reservation', 'TourPackage\TourPackageController@tourPackage_complete_reservation')->name('tourPackage_complete_reservation');
Route::get('tourPackage_rejected_reservation', 'TourPackage\TourPackageController@tourPackage_rejected_reservation')->name('tourPackage_rejected_reservation');

Route::resource('venues', 'Venue\VenueController')->parameter('venues','id');
Route::get('venue_pending_reservation', 'Venue\VenueController@venue_pending_reservation')->name('venue_pending_reservation');
Route::get('venue_approved_reservation', 'Venue\VenueController@venue_approved_reservation')->name('venue_approved_reservation');
Route::get('venue_complete_reservation', 'Venue\VenueController@venue_complete_reservation')->name('venue_complete_reservation');
Route::get('venue_rejected_reservation', 'Venue\VenueController@venue_rejected_reservation')->name('venue_rejected_reservation');

Route::resource('visas', 'Visa\VisaController')->parameter('visas','id');
Route::get('visa_pending_reservation', 'Visa\VisaController@visa_pending_reservation')->name('visa_pending_reservation');
Route::get('visa_approved_reservation', 'Visa\VisaController@visa_approved_reservation')->name('visa_approved_reservation');
Route::get('visa_complete_reservation', 'Visa\VisaController@visa_complete_reservation')->name('visa_complete_reservation');
Route::get('visa_rejected_reservation', 'Visa\VisaController@visa_rejected_reservation')->name('visa_rejected_reservation');

Route::resource('sliders', 'Slider\SliderController')->parameter('sliders','id');
