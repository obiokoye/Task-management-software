<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Eloquent\Model::belongsTomany("App\Role");
use Illuminate\Database\Seeder;
use App\Models\User;
use APP\Models\Role;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $agentRole = Role::where('name', 'agent')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'email'=> 'admin@admin.com',
            'password' => Hash::make('12345678')
        ]);
        $agent = User::create([
            'name' => 'Author User',
            'email'=> 'author@author.com',
            'password' => Hash::make('password'),
        ]);
        $user = User::create
        ([
            'name' => 'Generic User',
            'email'=> 'user@user.com',
            'password' => Hash::make('password')
       ]);
        $admin->roles()->attach($adminRole);
        $agent->roles()->attach($agentRole);
        $user->roles()->attach($userRole);
    }
}
