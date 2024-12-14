<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = ['name','address','district','city','phone','email','website','registration_number','established_year'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    public function klasses()
    {
        return $this->hasMany(Klass::class);
    }

    public function classfee()
    {
        return $this->hasMany(ClassFee::class);
    }
}
