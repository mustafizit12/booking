<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;
class HotelReservation extends Model
{
  protected $fillable = ['hotel_id', 'room_id','from_date','to_date','adult_quantity','child_quantity','room','days','total_rent','spical_requirment','order_status','order_by','payment_type','approved_by','created_by','updated_by', 'is_active'];

  protected $fakeFields = ['hotel_id', 'room_id','from_date','to_date','adult_quantity','child_quantity','room','days','total_rent','spical_requirment','order_status','order_by','approved_by','payment_type','created_by','updated_by', 'is_active'];

  public function hotel()
  {
      return $this->belongsTo(Hotel::class,'hotel_id');
  }
  public function rooms()
  {
      return $this->belongsTo(Room::class,'room_id');
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
