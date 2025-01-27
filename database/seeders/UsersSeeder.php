<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run()
    {
        // Create Admin User
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@wsi.com',
            'password' => Hash::make('password'), // Use a secure password
        ]);

        $admin->assignRole('admin');

        // Create Staff User
        $staff = User::create([
            'name' => 'Staff User',
            'email' => 'staff@wsi.com',
            'password' => Hash::make('password'), // Use a secure password
        ]);

        $staff->assignRole('staff');
    }
}
