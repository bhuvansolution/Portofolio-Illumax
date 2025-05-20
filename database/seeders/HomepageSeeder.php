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
            'gambar' => '["banner-6823f5ef4f982.jpg","banner-6823f5ef4ffd6.jpg","banner-68294371d06cb.jpeg","banner-68294371d08fa.jpeg","banner-68294371d0466.jpeg"]'
        ]);
    }
}
