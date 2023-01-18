<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Body;

class Fee extends Model
{
    use HasFactory;
    protected $table = 'fees';
    protected $fillable = ['amount', 'body_id', 'frequency'];

    // /**
    //  this create a relationship with the body
    //  */
    public function bodies()
    {
        return $this->belongsTo(Body::class);
    }
}
