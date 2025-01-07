<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeePayment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','fee_type_id','amount','due_date','balance_due','status','fee_month','payment_date','school_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function feetype()
    {
        return $this->belongsTo(FeeType::class,'fee_type_id','id');
    }




}


