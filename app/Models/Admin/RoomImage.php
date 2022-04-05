<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class RoomImage extends Model
{
  protected $fillable = ['room_id', 'image_path'];

  protected $fakeFields = ['room_id', 'image_path'];

  public function room()
  {
      return $this->belongsTo(Room::class,'room_id');
  }
}
