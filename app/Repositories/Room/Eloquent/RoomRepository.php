<?php

namespace App\Repositories\Room\Eloquent;
use App\Repositories\Room\Interfaces\RoomInterface;
use App\Models\Admin\Room;
use App\Repositories\BaseRepository;

class RoomRepository extends BaseRepository implements RoomInterface
{
    /**
    * @var Room
    */
     protected $model;

     public function __construct(Room $room)
     {
        $this->model = $room;
     }
}