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
        'roll_no',
        'monthly_fee',
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

    public function parent()
    {
        return $this->belongsTo(User::class);
    }

    public function klass()
    {
        return $this->belongsTo(Klass::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
