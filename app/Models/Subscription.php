<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    //type is for future relational database
    //usage_type is trail or something
    protected $fillable = ['school_id','type','usage_type','payment_method','amount','status','start_date','end_date','duration'];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
