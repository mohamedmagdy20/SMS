<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribution extends Model
{
    use HasFactory;
    protected $table = 'distributions';

    protected $fillable =[
        'user_id',
        'subject_id',
        'semester_id',
        'class_id',
        'day_id',
        'time'
    ];


    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class,'semester_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function classes()
    {
        return $this->belongsTo(Classes::class,'class_id');

    }
}
