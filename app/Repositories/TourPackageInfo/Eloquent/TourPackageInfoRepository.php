<?php

namespace App\Repositories\TourPackageInfo\Eloquent;
use App\Repositories\TourPackageInfo\Interfaces\TourPackageInfoInterface;
use App\Models\Admin\TourPackageInfo;
use App\Repositories\BaseRepository;

class TourPackageInfoRepository extends BaseRepository implements TourPackageInfoInterface
{
    /**
    * @var TourPackageInfo
    */
     protected $model;

     public function __construct(TourPackageInfo $tourPackageInfo)
     {
        $this->model = $tourPackageInfo;
     }
}