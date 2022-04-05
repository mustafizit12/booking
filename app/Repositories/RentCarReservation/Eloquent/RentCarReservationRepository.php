<?php

namespace App\Repositories\RentCarReservation\Eloquent;
use App\Repositories\RentCarReservation\Interfaces\RentCarReservationInterface;
use App\Models\Admin\RentCarReservation;
use App\Repositories\BaseRepository;

class RentCarReservationRepository extends BaseRepository implements RentCarReservationInterface
{
    /**
    * @var RentCarReservation
    */
     protected $model;

     public function __construct(RentCarReservation $rentCarReservation)
     {
        $this->model = $rentCarReservation;
     }
}