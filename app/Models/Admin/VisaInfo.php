<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;
class VisaInfo extends Model
{
  protected $fillable = ['title', 'visa_country','cost','details','visa_duration','image','created_by','updated_by', 'is_active'];

  protected $fakeFields = ['title', 'visa_country','cost','details','visa_duration','image','created_by','updated_by', 'is_active'];

  public function createdBy()
  {
      return $this->belongsTo(User::class,'created_by');
  }
  public function updatedBy()
  {
      return $this->belongsTo(User::class,'updated_by');
  }
}
