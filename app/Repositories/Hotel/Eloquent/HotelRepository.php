<?php

namespace App\Repositories\Hotel\Eloquent;
use App\Repositories\Hotel\Interfaces\HotelInterface;
use App\Models\Admin\Hotel;
use App\Repositories\BaseRepository;

class HotelRepository extends BaseRepository implements HotelInterface
{
    /**
    * @var Hotel
    */
     protected $model;

     public function __construct(Hotel $hotel)
     {
        $this->model = $hotel;
     }
}