<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        Testimonial::create([
            'name' => 'Elena M.',
            'message' => 'Paperbound completely transformed my reading journey. The recommendations are spot-on and delivery is blazing fast!',
            'rating' => 5
        ]);

        Testimonial::create([
            'name' => 'James P.',
            'message' => 'The best bookstore experience I\'ve had. Their curation is impeccable and the community is so welcoming.',
            'rating' => 5
        ]);

        Testimonial::create([
            'name' => 'Sarah K.',
            'message' => 'Love the book club meetings and author events. Paperbound feels like a second home for book lovers.',
            'rating' => 5
        ]);
    }
}
