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
            'textatas' => 'textatas',
            'judul' => 'judul',
            'description' => 'description',
            'textbawah' => 'textbawah',
            'engtextatas' => 'engtextatas',
            'engjudul' => 'engjudul',
            'engdescription' => 'engdescription',
            'engtextbawah' => 'engtextbawah',

        ]);
    }
}
