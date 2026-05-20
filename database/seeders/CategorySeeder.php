<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'name' => 'Fantasy',
            'icon' => 'fa-dragon',
            'description' => 'Discover magical worlds and epic quests',
            'book_count' => '126'
        ]);

        Category::create([
            'name' => 'Romance',
            'icon' => 'fa-heart',
            'description' => 'Heartwarming tales of love and connection',
            'book_count' => '98'
        ]);

        Category::create([
            'name' => 'Sci-Fi',
            'icon' => 'fa-microchip',
            'description' => 'Explore future worlds and technologies',
            'book_count' => '203'
        ]);

        Category::create([
            'name' => 'History',
            'icon' => 'fa-landmark',
            'description' => 'Journey through time and historical events',
            'book_count' => '85'
        ]);

        Category::create([
            'name' => 'Psychology',
            'icon' => 'fa-brain',
            'description' => 'Understand the human mind and behavior',
            'book_count' => '64'
        ]);
    }
}
