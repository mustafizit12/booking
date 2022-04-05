<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class VenueImage extends Model
{
  protected $fillable = ['venue_id', 'image_path'];

  protected $fakeFields = ['venue_id', 'image_path'];

  public function venue()
  {
      return $this->belongsTo(VenueInfo::class,'venue_id');
  }
}
