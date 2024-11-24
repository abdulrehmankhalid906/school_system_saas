<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'parent_id',
        'klass_id',
        'section_id',
        'date_of_birth',
        'gender',
        'enrollment_date',
        'session'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
