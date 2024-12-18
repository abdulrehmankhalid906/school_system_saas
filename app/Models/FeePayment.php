<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeePayment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','fee_type_id','amount','due_date','status','fee_month','payment_date','school_id'];
}
