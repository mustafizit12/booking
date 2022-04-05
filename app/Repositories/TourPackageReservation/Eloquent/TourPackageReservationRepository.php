<?php

namespace App\Repositories\TourPackageReservation\Eloquent;
use App\Repositories\TourPackageReservation\Interfaces\TourPackageReservationInterface;
use App\Models\Admin\TourPackageReservation;
use App\Repositories\BaseRepository;

class TourPackageReservationRepository extends BaseRepository implements TourPackageReservationInterface
{
    /**
    * @var TourPackageReservation
    */
     protected $model;

     public function __construct(TourPackageReservation $tourPackageReservation)
     {
        $this->model = $tourPackageReservation;
     }
}