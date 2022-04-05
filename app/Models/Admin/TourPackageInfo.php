<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;
class TourPackageInfo extends Model
{
  protected $fillable = ['package_name', 'valid_till','details','package_cost','discount','created_by','updated_by', 'is_active'];

  protected $fakeFields = ['package_name', 'valid_till','details','package_cost','discount','created_by','updated_by', 'is_active'];

  public function image()
  {
      return $this->hasmany(TourPackageImage::class,'package_id');
  }
  public function tourPackageReservation()
  {
      return $this->hasmany(TourPackageReservation::class);
  }
  public function createdBy()
  {
      return $this->belongsTo(User::class,'created_by');
  }
  public function updatedBy()
  {
      return $this->belongsTo(User::class,'updated_by');
  }
}
