<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;
class Hotel extends Model
{
  protected $fillable = ['user_id', 'area_id','agent_id','name','description','vendor_commision','agent_commision','address','features','hotel_category','contact_number','min_room_cost','max_room_cost','hotel_keywords','room_keywords','created_by','updated_by', 'is_active'];

  protected $fakeFields = ['user_id', 'area_id','agent_id','name','description','vendor_commision','agent_commision','address','features','hotel_category','contact_number','min_room_cost','max_room_cost','hotel_keywords','room_keywords','created_by','updated_by', 'is_active'];

  public function rooms()
  {
      return $this->hasmany(Room::class);
  }
  public function keywords()
  {
      return $this->hasmany(HotelKeywords::class);
  }
  public function roomkeywords()
  {
      return $this->hasmany(RoomKeywords::class);
  }
  public function getLoestRoomPrice($id){
    $model  = Room::where('hotel_id',$id)->orderBy('room_rent_adult','asc')->first();
    if($model){
      return $model->room_rent_adult;
    }
    return 0;
  }
  public function user()
  {
      return $this->belongsTo(User::class,'user_id');
  }
  public function agent_user()
  {
      return $this->belongsTo(User::class,'agent_id');
  }
  public function image()
  {
      return $this->hasmany(HotelImage::class);
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
  public function area()
  {
      return $this->belongsTo(Area::class,'area_id');
  }
}
