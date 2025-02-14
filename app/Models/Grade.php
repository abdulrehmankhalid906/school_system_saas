<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['school_id', 'title', 'range'];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
