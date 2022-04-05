<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class RoomKeywords extends Model
{
  protected $fillable = ['hotel_id','room_id', 'keyword'];

  protected $fakeFields = ['hotel_id','room_id', 'keyword'];

  public function hotel()
  {
      return $this->belongsTo(Hotel::class,'hotel_id');
  }

  public function room()
  {
      return $this->belongsTo(Room::class,'room_id');
  }
}
