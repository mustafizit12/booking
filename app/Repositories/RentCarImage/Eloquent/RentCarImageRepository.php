<?php

namespace App\Repositories\RentCarImage\Eloquent;
use App\Repositories\RentCarImage\Interfaces\RentCarImageInterface;
use App\Models\Admin\RentCarImage;
use App\Repositories\BaseRepository;

class RentCarImageRepository extends BaseRepository implements RentCarImageInterface
{
    /**
    * @var RentCarImage
    */
     protected $model;

     public function __construct(RentCarImage $rentCarImage)
     {
        $this->model = $rentCarImage;
     }
}