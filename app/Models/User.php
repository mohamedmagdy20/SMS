<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeTeacher($query)
    {
        $query->whereHas('roles',function($query){
            $query->where('name', 'teacher');
        });
    }


    public function scopeAdmin($query)
    {
        $query->whereHas('roles',function($query){
            $query->whereIn('name',['admin','super_admin']);
        });
    }

    public function scopeStudent($query)
    {
        $query->whereHas('roles',function($query){
            $query->where('name', 'student');
        });
    }

    public function teacherData()
    {
        return $this->hasOne(TeacherData::class,'user_id');
    }


    public function studentData()
    {
        return $this->hasOne(StudentData::class,'user_id');
    }
}
