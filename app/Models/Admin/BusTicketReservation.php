<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;
class BusTicketReservation extends Model
{
  protected $fillable = ['bus_id', 'seat_quantity','total_rent','order_status','order_by','approved_by','created_by','spical_requirment','payment_type','updated_by', 'is_active'];

  protected $fakeFields = ['bus_id', 'seat_quantity','total_rent','order_status','order_by','approved_by','created_by','spical_requirment','payment_type','updated_by', 'is_active'];

  public function bus()
  {
      return $this->belongsTo(BusInfo::class);
  }
  public function orderBy()
  {
      return $this->belongsTo(User::class,'order_by');
  }
  public function approveBy()
  {
      return $this->belongsTo(User::class,'approved_by');
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
