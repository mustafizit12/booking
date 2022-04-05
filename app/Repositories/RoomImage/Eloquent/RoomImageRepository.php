<?php

namespace App\Repositories\RoomImage\Eloquent;
use App\Repositories\RoomImage\Interfaces\RoomImageInterface;
use App\Models\Admin\RoomImage;
use App\Repositories\BaseRepository;

class RoomImageRepository extends BaseRepository implements RoomImageInterface
{
    /**
    * @var RoomImage
    */
     protected $model;

     public function __construct(RoomImage $roomImage)
     {
        $this->model = $roomImage;
     }
}