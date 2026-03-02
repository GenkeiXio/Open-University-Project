<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Faculty;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faculty::create([
            'f_name' => 'OpenU',
            'l_name' => 'Faculty',
            'username' => 'faculty@bicol-u.edu.ph',
            'password' => Hash::make('faculty2026'),
            'role' => 'faculty',
            'status' => 'active'
        ]);
    }
}
