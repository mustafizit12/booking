<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Area;
class UserProfile extends Model
{
    protected $fillable = ['user_id','area_id', 'first_name', 'last_name', 'address', 'phone','age','gender','dob','know_language','city','zip','other_image'];

    protected $fakeFields = ['user_id','area_id', 'first_name', 'last_name', 'address', 'phone','age','gender','dob','know_language','city','zip','other_image'];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class,'area_id');
    }
}
