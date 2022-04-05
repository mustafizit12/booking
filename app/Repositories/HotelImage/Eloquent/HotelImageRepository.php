<?php

namespace App\Repositories\HotelImage\Eloquent;
use App\Repositories\HotelImage\Interfaces\HotelImageInterface;
use App\Models\Admin\HotelImage;
use App\Repositories\BaseRepository;

class HotelImageRepository extends BaseRepository implements HotelImageInterface
{
    /**
    * @var HotelImage
    */
     protected $model;

     public function __construct(HotelImage $hotelImage)
     {
        $this->model = $hotelImage;
     }
}