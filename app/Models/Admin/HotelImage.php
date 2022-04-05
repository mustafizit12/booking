<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class HotelImage extends Model
{
  protected $fillable = ['hotel_id', 'image_path'];

  protected $fakeFields = ['hotel_id', 'image_path'];

  public function hotel()
  {
      return $this->belongsTo(Hotel::class,'hotel_id');
  }
}
