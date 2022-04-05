<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;
class BusInfo extends Model
{
  protected $fillable = ['company_name', 'bus_model','bus_quality','starting_point','end_point','departure_time','arrival_time','seat_quantity','price','created_by','updated_by', 'is_active'];

  protected $fakeFields = ['company_name', 'bus_model','bus_quality','starting_point','end_point','departure_time','arrival_time','seat_quantity','price','created_by','updated_by', 'is_active'];

  public function image()
  {
      return $this->hasmany(BusImage::class,'bus_id');
  }
  public function busTicket()
  {
      return $this->hasmany(BusTicketReservation::class);
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
