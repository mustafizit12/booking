<?php

namespace App\Repositories\VenueImage\Eloquent;
use App\Repositories\VenueImage\Interfaces\VenueImageInterface;
use App\Models\Admin\VenueImage;
use App\Repositories\BaseRepository;

class VenueImageRepository extends BaseRepository implements VenueImageInterface
{
    /**
    * @var VenueImage
    */
     protected $model;

     public function __construct(VenueImage $venueImage)
     {
        $this->model = $venueImage;
     }
}