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
        ]);
    }
}
