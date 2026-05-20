<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        $programs = [
            [
                'name' => 'Doctor of Education in Educational Leadership & Management',
                'code' => 'EdDELM',
            ],
            [
                'name' => 'Master of Arts in Educational Leadership & Management',
                'code' => 'MAELM',
            ],
            [
                'name' => 'Master of Arts in English Education',
                'code' => 'MAEngEd',
            ],
            [
                'name' => 'Master of Arts in Social Studies Education',
                'code' => 'MASocStEd',
            ],
            [
                'name' => 'Master in Management',
                'code' => 'MM',
            ],
            [
                'name' => 'Master of Public Administration',
                'code' => 'MPA',
            ],
        ];

        foreach ($programs as $program) {
            Program::create($program);
        }
    }
}