<?php

namespace App\Repositories\HotelKeywords\Eloquent;
use App\Repositories\HotelKeywords\Interfaces\HotelKeywordsInterface;
use App\Models\Admin\HotelKeywords;
use App\Repositories\BaseRepository;

class HotelKeywordsRepository extends BaseRepository implements HotelKeywordsInterface
{
    /**
    * @var HotelKeywords
    */
     protected $model;

     public function __construct(HotelKeywords $hotelKeywords)
     {
        $this->model = $hotelKeywords;
     }
}