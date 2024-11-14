<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','name','address','district','city','phone','email','website','registration_number','established_year'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function klasses()
    {
        return $this->hasMany(Klass::class);
    }
}
