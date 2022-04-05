<?php

namespace App\Repositories\VenueReservation\Eloquent;
use App\Repositories\VenueReservation\Interfaces\VenueReservationInterface;
use App\Models\Admin\VenueReservation;
use App\Repositories\BaseRepository;

class VenueReservationRepository extends BaseRepository implements VenueReservationInterface
{
    /**
    * @var VenueReservation
    */
     protected $model;

     public function __construct(VenueReservation $venueReservation)
     {
        $this->model = $venueReservation;
     }
}