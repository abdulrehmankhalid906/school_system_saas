<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = ['name','address','district','city','phone','email','website','logo','payment_status','status','registration_number','established_year'];

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

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function scopeStudentAndTeacherCounts($query)
    {
        return $query->withCount([
            'users as students' => function ($query) {
                $query->role('Student');
            },
            'users as teachers' => function ($query) {
                $query->role('Teacher');
            }
        ]);
    }
}
