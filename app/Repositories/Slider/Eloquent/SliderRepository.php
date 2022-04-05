<?php

namespace App\Repositories\Slider\Eloquent;
use App\Repositories\Slider\Interfaces\SliderInterface;
use App\Models\Admin\Slider;
use App\Repositories\BaseRepository;

class SliderRepository extends BaseRepository implements SliderInterface
{
    /**
    * @var Slider
    */
     protected $model;

     public function __construct(Slider $slider)
     {
        $this->model = $slider;
     }
}