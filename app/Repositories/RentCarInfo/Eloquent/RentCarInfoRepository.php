<?php

namespace App\Repositories\RentCarInfo\Eloquent;
use App\Repositories\RentCarInfo\Interfaces\RentCarInfoInterface;
use App\Models\Admin\RentCarInfo;
use App\Repositories\BaseRepository;

class RentCarInfoRepository extends BaseRepository implements RentCarInfoInterface
{
    /**
    * @var RentCarInfo
    */
     protected $model;

     public function __construct(RentCarInfo $rentCarInfo)
     {
        $this->model = $rentCarInfo;
     }
}