<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeHistory extends Model
{
    use HasFactory;

    protected $fillable = ['fee_payment_id', 'amount', 'method', 'transaction_date', 'recieved_by'];

    public function feePayment()
    {
        return $this->belongsTo(FeePayment::class);
    }
}
