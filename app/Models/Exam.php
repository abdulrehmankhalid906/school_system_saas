<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $casts = [
        'is_active' => 'boolean'
    ];

    protected $fillable = ['school_id','title','start_date','end_date','is_active'];
}
