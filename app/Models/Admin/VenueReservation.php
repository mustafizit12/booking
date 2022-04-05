<?php

namespace App\Models\Admin;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class VenueReservation extends Model
{
  protected $fillable = ['venue_id', 'from_date','to_date','total_rent','order_status','order_by','approved_by','created_by','spical_requirment','payment_type','updated_by', 'is_active'];

  protected $fakeFields = ['venue_id', 'from_date','to_date','total_rent','order_status','order_by','approved_by','created_by','spical_requirment','updated_by','payment_type', 'is_active'];

  public function venue()
  {
      return $this->belongsTo(VenueInfo::class,'venue_id');
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
