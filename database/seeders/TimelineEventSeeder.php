<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TimelineEvent;

class TimelineEventSeeder extends Seeder
{
    public function run(): void
    {
        TimelineEvent::create([
            'year' => 2022,
            'title' => 'Humble Beginnings',
            'description' => 'Started as a tiny pop-up shop in Seattle, with 200 curated titles and a mission to celebrate indie authors.',
            'icon' => 'fa-seedling',
            'order' => 1
        ]);

        TimelineEvent::create([
            'year' => 2023,
            'title' => 'Going Digital',
            'description' => 'Launched our online store, reaching readers nationwide. Introduced personalized book subscription boxes.',
            'icon' => 'fa-laptop',
            'order' => 2
        ]);

        TimelineEvent::create([
            'year' => 2024,
            'title' => 'Community First',
            'description' => 'Launched monthly book clubs, author events, and a reading rewards program. 10k+ members strong.',
            'icon' => 'fa-users',
            'order' => 3
        ]);

        TimelineEvent::create([
            'year' => 2025,
            'title' => 'The Future',
            'description' => 'Expanding our indie press program, launching a podcast, and building the world\'s coziest reading app.',
            'icon' => 'fa-chart-line',
            'order' => 4
        ]);
    }
}
