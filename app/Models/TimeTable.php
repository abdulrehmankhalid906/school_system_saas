<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    use HasFactory;

    protected $fillable = ['title','school_id', 'time_table', 'klass_id', 'section_id'];

    // protected $casts = [
    //     'time_table' => 'array'
    // ];

    public function klass()
    {
        return $this->belongsTo(Klass::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
