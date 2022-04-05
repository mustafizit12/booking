<?php

namespace App\Repositories\RoomKeywords\Eloquent;
use App\Repositories\RoomKeywords\Interfaces\RoomKeywordsInterface;
use App\Models\Admin\RoomKeywords;
use App\Repositories\BaseRepository;

class RoomKeywordsRepository extends BaseRepository implements RoomKeywordsInterface
{
    /**
    * @var RoomKeywords
    */
     protected $model;

     public function __construct(RoomKeywords $roomKeywords)
     {
        $this->model = $roomKeywords;
     }
}