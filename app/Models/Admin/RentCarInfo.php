<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;
class RentCarInfo extends Model
{
  protected $fillable = ['owner_name', 'car_model','owner_contact','owner_address','description','created_by','updated_by', 'is_active'];

  protected $fakeFields = ['owner_name', 'car_model','owner_contact','owner_address','description','created_by','updated_by', 'is_active'];

  public function image()
  {
      return $this->hasmany(RentCarImage::class,'car_id');
  }
  public function rentCarReservation()
  {
      return $this->hasmany(RentCarReservation::class);
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
