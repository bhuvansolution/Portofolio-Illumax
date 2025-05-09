<?php

namespace Database\Seeders;

use App\Models\WhyChoose;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WhyChooseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WhyChoose::firstOrCreate([], [
            'title' => '["title"]',
            'description' => '["description"]',
            'engtitle' => '["engtitle"]',
            'engdescription' => '["engdescription"]'
        ]);
    }
}
