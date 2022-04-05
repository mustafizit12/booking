<?php

namespace App\Repositories\PhoneOtp\Eloquent;
use App\Repositories\PhoneOtp\Interfaces\PhoneOtpInterface;
use App\Models\Admin\PhoneOtp;
use App\Repositories\BaseRepository;

class PhoneOtpRepository extends BaseRepository implements PhoneOtpInterface
{
    /**
    * @var PhoneOtp
    */
     protected $model;

     public function __construct(PhoneOtp $phoneOtp)
     {
        $this->model = $phoneOtp;
     }
}