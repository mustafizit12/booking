<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
  protected $fillable = ['name', 'details', 'is_active'];

  protected $fakeFields = ['name', 'details', 'is_active'];

}
