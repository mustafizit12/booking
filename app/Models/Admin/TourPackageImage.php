<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class TourPackageImage extends Model
{
  protected $fillable = ['package_id', 'image_path'];

  protected $fakeFields = ['package_id', 'image_path'];

  public function tourPackage()
  {
      return $this->belongsTo(TourPackageInfo::class,'package_id');
  }
}
