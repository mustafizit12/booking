<?php

namespace App\Repositories\VisaReservation\Eloquent;
use App\Repositories\VisaReservation\Interfaces\VisaReservationInterface;
use App\Models\Admin\VisaReservation;
use App\Repositories\BaseRepository;

class VisaReservationRepository extends BaseRepository implements VisaReservationInterface
{
    /**
    * @var VisaReservation
    */
     protected $model;

     public function __construct(VisaReservation $visaReservation)
     {
        $this->model = $visaReservation;
     }
}