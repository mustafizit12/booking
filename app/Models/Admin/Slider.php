<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;
class Slider extends Model
{
  protected $fillable = ['title', 'details','image','created_by','updated_by', 'is_active'];

  protected $fakeFields = ['title', 'details','image','created_by','updated_by', 'is_active'];
  public function createdBy()
  {
      return $this->belongsTo(User::class,'created_by');
  }
  public function updatedBy()
  {
      return $this->belongsTo(User::class,'updated_by');
  }
}
