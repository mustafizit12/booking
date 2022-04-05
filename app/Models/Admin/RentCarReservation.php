<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;
class RentCarReservation extends Model
{
  protected $fillable = ['rent_id', 'total_rent','order_status','order_by','approved_by','created_by','payment_type','spical_requirment','updated_by', 'is_active'];

  protected $fakeFields = ['rent_id', 'total_rent','order_status','order_by','approved_by','created_by','payment_type','spical_requirment','updated_by', 'is_active'];

  public function rentCar()
  {
      return $this->belongsTo(RentCarInfo::class,'rent_id');
  }

  public function createdBy()
  {
      return $this->belongsTo(User::class,'created_by');
  }
  public function updatedBy()
  {
      return $this->belongsTo(User::class,'updated_by');
  }
  public function orderBy()
  {
      return $this->belongsTo(User::class,'order_by');
  }
  public function approveBy()
  {
      return $this->belongsTo(User::class,'approved_by');
  }
}
