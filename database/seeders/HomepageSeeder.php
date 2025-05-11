<?php

namespace Database\Seeders;

use App\Models\HomePage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomepageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HomePage::firstOrCreate([], [
            'title' => 'abcd',
            'engtitle' => 'engtitle',
            'gambar' => '["banner-68203a3b174f6.jpg","banner-68203a3b17d7b.jpg"]'
        ]);
    }
}
