<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class HotelKeywords extends Model
{
  protected $fillable = ['hotel_id', 'keyword'];

  protected $fakeFields = ['hotel_id', 'keyword'];

  public function hotel()
  {
      return $this->belongsTo(Hotel::class,'hotel_id');
  }
}
