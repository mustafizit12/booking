<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;
class VenueInfo extends Model
{
  protected $fillable = ['venue_name', 'area_id','description','address','contact_info','features','rent','discount','created_by','updated_by', 'is_active'];

  protected $fakeFields = ['venue_name', 'area_id','description','address','contact_info','features','rent','discount','created_by','updated_by', 'is_active'];

  public function image()
  {
      return $this->hasmany(VenueImage::class,'venue_id');
  }
  public function venueReservation()
  {
      return $this->hasmany(VenueReservation::class);
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
