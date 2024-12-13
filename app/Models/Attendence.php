<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','klass_id','section_id','status','date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
