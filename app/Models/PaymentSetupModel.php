<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PaymentSetupModel extends Model
{
    use HasFactory;
    protected $table = 'payment_setup_models';
    protected $fillable = [
        'body_id',
        'payment_type',
        'amount'
    ];

    public function payment()
    {
        return $this->belongsToMany(Body::class);
    }
}
