<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompanyInfo;

class CompanyInfoSeeder extends Seeder
{
    public function run(): void
    {
        CompanyInfo::create(['type' => 'phone', 'value' => '(555) 123-4567']);
        CompanyInfo::create(['type' => 'email', 'value' => 'support@bookstore.com']);
        CompanyInfo::create(['type' => 'support_hours', 'value' => 'Mon-Fri 9am-6pm, Sat 10am-4pm']);
        CompanyInfo::create(['type' => 'store_hours', 'value' => 'Mon–Sat 10am–8pm, Sun 11am–6pm']);
        CompanyInfo::create(['type' => 'address', 'value' => '123 Storybook Lane, Seattle, WA']);
        CompanyInfo::create(['type' => 'founded_year', 'value' => '2022']);
        CompanyInfo::create(['type' => 'mission', 'value' => 'To ignite curiosity, one page at a time.']);
        CompanyInfo::create(['type' => 'happy_readers', 'value' => '20000']);
        CompanyInfo::create(['type' => 'publishers', 'value' => '350']);
        CompanyInfo::create(['type' => 'rating', 'value' => '4.9']);
        CompanyInfo::create(['type' => 'awards', 'value' => '12']);
    }
}
