<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','salary','code','join_date','is_attendance','is_mark'];

    protected $casts = [
        'is_attendance' => 'boolean',
        'is_mark' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeIsAttendance($query)
    {
        return $query->where('is_attendance', 1);
    }

    public function scopeIsMark($query)
    {
        return $query->where('is_mark', 1);
    }

    public function canAttendance()
    {
        $this->is_attendance == 1;
    }

    public function canMark()
    {
        $this->is_mark == 1;
    }
}
