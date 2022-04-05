<?php

namespace App\Repositories\BusImage\Eloquent;
use App\Repositories\BusImage\Interfaces\BusImageInterface;
use App\Models\Admin\BusImage;
use App\Repositories\BaseRepository;

class BusImageRepository extends BaseRepository implements BusImageInterface
{
    /**
    * @var BusImage
    */
     protected $model;

     public function __construct(BusImage $busImage)
     {
        $this->model = $busImage;
     }
}