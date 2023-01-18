<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTransactionsModel extends Model
{
    use HasFactory;
    protected $table = 'payment_transactions_models';
    protected $fillable = [
        'image',
        'body_id',
        'fees_id',
        'amountpayable',
        'transaction_number',
        'amount',
        'date',
        'agent_id',
        'firstname',
        'lastname',
        'bankname',
    ];

}
