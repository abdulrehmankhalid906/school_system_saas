<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\School;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['course_name','school_id','course_code'];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
