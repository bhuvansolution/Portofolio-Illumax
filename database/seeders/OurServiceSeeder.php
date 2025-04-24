<?php

namespace Database\Seeders;

use App\Models\OurService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Queue\NullQueue;

class OurServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OurService::firstOrCreate([], [
            'title' => null,
            'description' => Null
        ]);
    }
}
