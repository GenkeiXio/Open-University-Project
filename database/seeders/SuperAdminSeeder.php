<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\SuperAdmin;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        SuperAdmin::create([
            'f_name' => 'OpenU',
            'l_name' => 'SuperAdmin',
            'username' => 'superadmin@bicol-u.edu.ph',
            'password' => Hash::make('BUOU2026'),
            'role' => 'super admin',
            'status' => 'active'
        ]);
    }
}
