<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'klass_id',
        'section_id',
        'first_name',
        'last_name',
        'father_name',
        'date_of_birth',
        'gender',
        'address',
        'district',
        'city',
        'phone',
        'email',
        'guardian_name',
        'guardian_phone',
        'enrollment_date',
        'session'
    ];
}
