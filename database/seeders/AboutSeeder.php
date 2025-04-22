<?php

namespace Database\Seeders;

use App\Models\Aboutus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Aboutus::updateOrCreate([
            'description' => 'Test',
            'visi' => 'Test',
            'misi' => 'Test',
            'vision' => 'Test',
            'mission' => 'Test',
        ]);
    }
}
