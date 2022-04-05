<?php

namespace App\Repositories\BusInfo\Eloquent;
use App\Repositories\BusInfo\Interfaces\BusInfoInterface;
use App\Models\Admin\BusInfo;
use App\Repositories\BaseRepository;

class BusInfoRepository extends BaseRepository implements BusInfoInterface
{
    /**
    * @var BusInfo
    */
     protected $model;

     public function __construct(BusInfo $busInfo)
     {
        $this->model = $busInfo;
     }
}