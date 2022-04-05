<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;
class TourPackageReservation extends Model
{
  protected $fillable = ['package_id', 'order_quantity','total_cost','order_status','order_by','approved_by','created_by','spical_requirment','payment_type','updated_by', 'is_active'];

  protected $fakeFields = ['package_id', 'order_quantity','total_cost','order_status','order_by','approved_by','created_by','spical_requirment','payment_type','updated_by', 'is_active'];

  public function package()
  {
      return $this->belongsTo(TourPackageInfo::class,'package_id');
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
