<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class BusImage extends Model
{
  protected $fillable = ['bus_id', 'image_path'];

  protected $fakeFields = ['bus_id', 'image_path'];

  public function bus()
  {
      return $this->belongsTo(BusInfo::class,'bus_id');
  }
}
