<?php

namespace App\Repositories\TourPackageImage\Eloquent;
use App\Repositories\TourPackageImage\Interfaces\TourPackageImageInterface;
use App\Models\Admin\TourPackageImage;
use App\Repositories\BaseRepository;

class TourPackageImageRepository extends BaseRepository implements TourPackageImageInterface
{
    /**
    * @var TourPackageImage
    */
     protected $model;

     public function __construct(TourPackageImage $tourPackageImage)
     {
        $this->model = $tourPackageImage;
     }
}