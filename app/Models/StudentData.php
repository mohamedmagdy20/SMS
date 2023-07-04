<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentData extends Model
{
    use HasFactory;
    protected $table = 'student_data';

    protected $fillable = 
    [
        'user_id',
        'date_of_birth',
        'gender',
        'uid',
        'semester_id',
        'class_id',
        'have_brother',
        'address',
        'have_discount',
        'uid_image',
        'certification_image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }


    public function semseter()
    {
        return $this->belongsTo(Semester::class,'semester_id');
    }

    public function class()
    {
        return $this->belongsTo(Classes::class,'class_id');
    }
}
