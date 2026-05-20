<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TeamMember;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        TeamMember::create([
            'name' => 'Sles Sakirin',
            'position' => 'Founder & Head Curator',
            'description' => 'Former librarian with a passion for discovering hidden gems. Morgan believes every book deserves a reader.',
            'social_links' => 'twitter,linkedin'
        ]);

        TeamMember::create([
            'name' => 'Lon Tola',
            'position' => 'Community Director',
            'description' => 'Organizes book clubs, author talks, and ensures every voice is heard. Jamal brings the magic of connection.',
            'social_links' => 'twitter,instagram'
        ]);

        TeamMember::create([
            'name' => 'Sern Chiminh',
            'position' => 'Creative Director',
            'description' => 'Designs the cozy aesthetic and makes our store a visual haven. Elena is also a speculative fiction writer.',
            'social_links' => 'dribbble,behance'
        ]);
    }
}
