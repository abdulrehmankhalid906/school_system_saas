<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klass extends Model
{
    use HasFactory;

    protected $fillable = ['name','school_id'];

    public function schools()
    {
        return $this->belongsTo(School::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
