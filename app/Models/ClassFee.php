<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassFee extends Model
{
    use HasFactory;

    protected $fillable = ['klass_id','class_fee','school_id'];

    public function klass()
    {
        return $this->belongsTo(Klass::class);
    }
}
