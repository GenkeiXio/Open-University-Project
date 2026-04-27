<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;

class UsersSeeder extends Seeder
{
   
    public function run(): void
    {
        Student::create([
            'txt_fname' => 'OpenU',
            'txt_lname' => 'Student',
            'txt_email' => 'student@bicol-u.edu.ph',
            'txt_password' => Hash::make('student2026'),
        ]);
    }
}
