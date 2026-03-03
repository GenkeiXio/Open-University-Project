<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // This calls your specific seeders in the order they should run
        $this->call([
            Admins::class,     // Creates your super admin and admin accounts
            NewsSeeder::class, // Fills the news and archive tables
        ]);
    }
}