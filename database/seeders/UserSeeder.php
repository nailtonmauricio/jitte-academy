<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'dev@jitte.com.br')->exists()) {
            $root = User::create([
                'name' => 'Root',
                'email' => 'dev@jitte.com.br',
                'password' => Hash::make('dev@jitte', ['rounds' => 12]),
            ]);

            $root->assignRole('Root');
        }

        if (!User::where('email', 'admin@jitte.com.br')->exists()) {
            $admin = User::create([
                'name' => 'Admin',
                'email' => 'admin@jitte.com.br',
                'password' => Hash::make('admin@jitte', ['rounds' => 12]),
            ]);

            $admin->assignRole('Admin');
        }
    }
}
