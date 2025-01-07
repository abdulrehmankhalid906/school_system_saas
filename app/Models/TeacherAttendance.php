<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherAttendance extends Model
{
    use HasFactory;

    protected $fillable = ['teacher_id','check_in','check_out','date', 'remarks'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}