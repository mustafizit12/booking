<?php

namespace App\Models\Admin;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class VisaReservation extends Model
{
  protected $fillable = ['visa_id','total_amount','order_status','order_by','approved_by','created_by','updated_by','payment_type','spical_requirment', 'is_active'];

  protected $fakeFields = ['visa_id','total_amount','order_status','order_by','approved_by','created_by','updated_by','payment_type','spical_requirment', 'is_active'];

  public function visa()
  {
      return $this->belongsTo(VisaInfo::class,'visa_id');
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
