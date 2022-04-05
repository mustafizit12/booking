<?php

namespace App\Models\User;
use Laravel\Passport\HasApiTokens;
use App\Models\Core\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Teacher\TeacherWorkPlaceDetails;
use App\Models\Teacher\TeacherUniversityDetails;
use App\Models\Teacher\TeacherCollageDetails;
use App\Models\Teacher\TeacherSchoolDetails;
use App\Models\Admin\Course;
class User extends Authenticatable
{
  use HasApiTokens, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'password', 'email', 'role_id', 'remember_me', 'avatar', 'is_email_verified', 'is_financial_active', 'is_accessible_under_maintenance', 'is_active', 'created_by'];

    protected $fakeFields = ['username', 'password', 'email', 'role_id', 'remember_me', 'avatar', 'is_email_verified', 'is_financial_active', 'is_accessible_under_maintenance', 'is_active', 'created_by'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function course()
    {
        return $this->hasMany(Course::class,'created_user_id');
    }

    public function workPlaceDetails()
    {
        return $this->hasMany(TeacherWorkPlaceDetails::class,'teacher_user_id');
    }
    public function universityDetails()
    {
        return $this->hasMany(TeacherUniversityDetails::class,'teacher_user_id');
    }
    public function collageDetails()
    {
        return $this->hasMany(TeacherCollageDetails::class,'teacher_user_id');
    }
    public function schoolDetails()
    {
        return $this->hasMany(TeacherSchoolDetails::class,'teacher_user_id');
    }
}
