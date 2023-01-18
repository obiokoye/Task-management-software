<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Bodycontroller;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;

class Body extends Model
{
    protected $fillable = [
        'name',
        'address',
        'phone',
        'amount'
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasAnyRoles($roles){
        if($this->roles()->whereIn('name', $roles)->first()){
            return true;
        }

        return false;
    }
    public function hasRole($role){
        if($this->roles()->where('name', $role)->first()){
            return true;
        }

        return false;
    }

    public function payment_type()
    {
        return $this->hasOne(PaymentSetupModel::class, 'body_id');
    }

}
