<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherData extends Model
{
    use HasFactory;
    protected $table = 'teacher_data';

    protected $fillable = [
        'address',
        'user_id',
        'tips',
    ];
}
