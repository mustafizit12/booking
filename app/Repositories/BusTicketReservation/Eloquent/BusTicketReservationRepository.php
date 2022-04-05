<?php

namespace App\Repositories\BusTicketReservation\Eloquent;
use App\Repositories\BusTicketReservation\Interfaces\BusTicketReservationInterface;
use App\Models\Admin\BusTicketReservation;
use App\Repositories\BaseRepository;

class BusTicketReservationRepository extends BaseRepository implements BusTicketReservationInterface
{
    /**
    * @var BusTicketReservation
    */
     protected $model;

     public function __construct(BusTicketReservation $busTicketReservation)
     {
        $this->model = $busTicketReservation;
     }
}