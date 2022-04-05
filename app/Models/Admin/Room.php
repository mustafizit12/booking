<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;
class Room extends Model
{
  protected $fillable = ['hotel_id', 'room_name','room_details','floor','room_keywords','quantity','room_rent_adult','discount_rent_adult','room_rent_child','discount_rent_child','person_quantity','created_by','updated_by', 'is_active'];

  protected $fakeFields = ['hotel_id', 'room_name','room_details','floor','room_keywords','quantity','room_rent_adult','discount_rent_adult','room_rent_child','discount_rent_child','person_quantity','created_by','updated_by', 'is_active'];

  public function hotel()
  {
      return $this->belongsTo(Hotel::class,'hotel_id');
  }
  public function keywords()
  {
      return $this->hasmany(RoomKeywords::class);
  }
  public function image()
  {
      return $this->hasmany(RoomImage::class);
  }
  public function hotelReservation()
  {
      return $this->hasmany(HotelReservation::class);
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
