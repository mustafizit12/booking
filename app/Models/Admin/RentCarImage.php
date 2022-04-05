<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class RentCarImage extends Model
{
  protected $fillable = ['car_id', 'image_path'];

  protected $fakeFields = ['car_id', 'image_path'];

  public function rentCar()
  {
      return $this->belongsTo(RentCarInfo::class,'car_id');
  }
}
