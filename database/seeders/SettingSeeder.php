<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::firstOrCreate(
            ['id' => 1], // You can use a specific ID to ensure a single record
            [
                'website_name' => 'Makshuf',
                'email' => 'info@makshuf.com',
                'address' => '123 Main St, Anytown, USA',
                'phone' => '+1-555-123-4567',
                'youtube' => 'https://www.youtube.com',
                'facebook' => 'https://www.facebook.com',
                'x' => 'https://www.x.com',
                'pinterest' => 'https://www.pinterest.com',
                'linkedin' => 'https://www.linkedin.com/in',
            ]
        );
    }
}
