<?php

namespace App\Repositories\HotelReservation\Eloquent;
use App\Repositories\HotelReservation\Interfaces\HotelReservationInterface;
use App\Models\Admin\HotelReservation;
use App\Repositories\BaseRepository;

class HotelReservationRepository extends BaseRepository implements HotelReservationInterface
{
    /**
    * @var HotelReservation
    */
     protected $model;

     public function __construct(HotelReservation $hotelReservation)
     {
        $this->model = $hotelReservation;
     }
}