<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['user_id', 'data', 'read_at'];

    protected $fakeFields = ['user_id', 'data', 'read_at'];
}
