<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','code','join_date','is_attendance'];

    protected $casts = [
        'is_attendance' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeIsAttendance($query)
    {
        return $query->where('is_attendance', 1);
    }
}
