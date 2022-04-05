<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class PhoneOtp extends Model
{
  protected $fillable = ['otp', 'phone','is_used'];

  protected $fakeFields = ['otp', 'phone','is_used'];
}
