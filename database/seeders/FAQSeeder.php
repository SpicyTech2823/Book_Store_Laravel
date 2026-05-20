<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FAQ;

class FAQSeeder extends Seeder
{
    public function run(): void
    {
        FAQ::create([
            'title' => 'Shipping times & costs',
            'description' => 'Free US shipping on orders $35+. Usually 3-7 business days. International shipping available.',
            'icon' => 'fa-truck-fast',
            'order' => 1
        ]);

        FAQ::create([
            'title' => 'Return policy',
            'description' => 'Love it or return within 30 days for a full refund. Damaged books? We\'ll replace immediately.',
            'icon' => 'fa-undo-alt',
            'order' => 2
        ]);

        FAQ::create([
            'title' => 'Book subscriptions',
            'description' => 'Yes! Join our monthly "First Edition" box – personalized picks delivered to your door.',
            'icon' => 'fa-gem',
            'order' => 3
        ]);

        FAQ::create([
            'title' => 'Author events',
            'description' => 'We host virtual and in-person readings. Check our events page or subscribe for updates.',
            'icon' => 'fa-chalkboard-user',
            'order' => 4
        ]);
    }
}
