<?php

namespace App\Repositories\VisaInfo\Eloquent;
use App\Repositories\VisaInfo\Interfaces\VisaInfoInterface;
use App\Models\Admin\VisaInfo;
use App\Repositories\BaseRepository;

class VisaInfoRepository extends BaseRepository implements VisaInfoInterface
{
    /**
    * @var VisaInfo
    */
     protected $model;

     public function __construct(VisaInfo $visaInfo)
     {
        $this->model = $visaInfo;
     }
}