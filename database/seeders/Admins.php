<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class Admins extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'txt_fname' => 'OpenU',
            'txt_minitial' => null,
            'txt_lname' => 'Admin',
            'txt_extension' => null, // NEW (can be null if none)
            'txt_email' => 'admin@bicol-u.edu.ph',
            'txt_password' => Hash::make('BUOU2026'),
            'txt_role' => 'admin',
            'txt_status' => 'active',
            'txt_position' => 'System Administrator' // NEW POSITION
        ]);

        Admin::create([
            'txt_fname' => 'OpenU',
            'txt_minitial' => null,
            'txt_lname' => 'Faculty',
            'txt_extension' => null, // NEW
            'txt_email' => 'faculty@bicol-u.edu.ph',
            'txt_password' => Hash::make('faculty2026'),
            'txt_role' => 'faculty',
            'txt_status' => 'active',
            'txt_position' => 'Faculty Member' // NEW POSITION
        ]);

        Admin::create([
            'txt_fname' => 'OpenU',
            'txt_minitial' => 'S',
            'txt_lname' => 'Staff',
            'txt_extension' => null,
            'txt_email' => 'staff@bicol-u.edu.ph',
            'txt_password' => Hash::make('staff2026'),
            'txt_role' => 'staff', // ✅ NEW ROLE
            'txt_status' => 'active',
            'txt_position' => 'Administrative Aide' // NEW POSITION
        ]);
    }
}