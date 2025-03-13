<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create roles if they don't exist
        $adminRole = Role::firstOrCreate(['name' => 'admin'], ['description' => 'Administrator with full access']);
        $userRole = Role::firstOrCreate(['name' => 'user'], ['description' => 'Regular user']);
        
        // Create admin user
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@aicademy.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        
        // Attach admin role
        $admin->roles()->attach($adminRole);
        
        // Create regular user
        $user = User::create([
            'name' => 'Regular User',
            'email' => 'user@aicademy.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        
        // Attach user role
        $user->roles()->attach($userRole);
        
        // Create some test users
        User::factory(5)->create()->each(function ($user) use ($userRole) {
            $user->roles()->attach($userRole);
        });
    }
}
