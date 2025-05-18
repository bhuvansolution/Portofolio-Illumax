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
            'gambar' => '["profesional.png"]',
            'title' => '["Profesional"]',
            'description' => '["Bekerja dengan standar tinggi, tepat waktu, dan bertanggung jawab dalam setiap proses."]',
            'engtitle' => '["Profesional"]',
            'engdescription' => '["Working with high standards, punctual and responsible in every process."]'
        ]);
    }
}
