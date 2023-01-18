<?php

namespace App\Models;
use Illuminate\Support\Facades\Gate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Role;
use App\Http\Controllers\AdminController;

class AgentModel extends Model
{
    use HasFactory;
    protected $table = 'agent_models';
    protected $primaryKey = 'id';
    protected $fillable =['agentname', 'email', 'address', 'phonenumber', 'state'];

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

}

