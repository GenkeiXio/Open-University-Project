<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // The "Latest News" (Most recent timestamp)
        \App\Models\News::create([
            'title' => 'BUeño journos shine at 23rd RTSPC',
            'content' => 'Full details about the journalism awards...',
            'image' => 'News/RTSPC_News.jpg',
            'created_at' => now(), 
        ]);

        // The "Archive News" (Older timestamp)
        \App\Models\News::create([
            'title' => 'Nebres leads national push for Culture',
            'content' => 'Details about the PASUC Summit...',
            'image' => 'News/PASUC_Summit.jpg',
            'created_at' => now()->subDays(5),
        ]);

        // News #3 (Older - will automatically move to Archive)
        News::create([
            'title' => 'Old News Item',
            'content' => 'This will move to the News Section tab...',
            'image' => 'News/image3.jpg',
            'created_at' => now()->subDays(1),
        ]);
    }
}
