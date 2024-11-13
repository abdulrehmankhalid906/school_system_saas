<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klass extends Model
{
    use HasFactory;

    protected $fillable = ['school_id','name','description'];

    public function schools()
    {
        return $this->belongsTo(School::class);
    }
}
