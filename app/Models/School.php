<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','name','address','district','city','postal_code','phone','email','website','registration_number','established_year'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
