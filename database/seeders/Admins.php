<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\SuperAdmin;

class Admins extends Seeder
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

        SuperAdmin::create([
            'f_name' => 'Juan',
            'l_name' => 'Dela Cruz',
            'username' => 'faculty@bicol-u.edu.ph',
            'password' => Hash::make('Faculty2026'),
            'role' => 'faculty',
            'status' => 'active'
        ]);
    }
}
