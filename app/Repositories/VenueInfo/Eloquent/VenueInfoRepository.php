<?php

namespace App\Repositories\VenueInfo\Eloquent;
use App\Repositories\VenueInfo\Interfaces\VenueInfoInterface;
use App\Models\Admin\VenueInfo;
use App\Repositories\BaseRepository;

class VenueInfoRepository extends BaseRepository implements VenueInfoInterface
{
    /**
    * @var VenueInfo
    */
     protected $model;

     public function __construct(VenueInfo $venueInfo)
     {
        $this->model = $venueInfo;
     }
}