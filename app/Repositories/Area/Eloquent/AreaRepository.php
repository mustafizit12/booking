<?php

namespace App\Repositories\Area\Eloquent;
use App\Repositories\Area\Interfaces\AreaInterface;
use App\Models\Admin\Area;
use App\Repositories\BaseRepository;

class AreaRepository extends BaseRepository implements AreaInterface
{
    /**
    * @var Area
    */
     protected $model;

     public function __construct(Area $area)
     {
        $this->model = $area;
     }
}