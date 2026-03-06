<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
   
    public function run(): void
    {
        User::create([
            'f_name' => 'OpenU',
            'l_name' => 'User',
            'username' => 'User@bicol-u.edu.ph',
            'password' => Hash::make('user2026'),
            'role' => 'user',
            'status' => 'active'
        ]);
    }
}
