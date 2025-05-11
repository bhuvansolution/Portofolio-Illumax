<?php

namespace Database\Seeders;

use App\Models\PortofolioPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortoPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PortofolioPage::updateOrCreate([
            'gambar' => 'portopage.jpg',
            'gambar1' => 'portopage1.jpg',
            'textatas' => 'Menggunakan kreativitas sebagai jembatan untuk berbagi kisah-kisah indah dan berdampak melalui visual dan suara.',
            'engtextatas' => 'Using creativity as a bridge to share beautiful and impactful stories through visual and sound.',
            'textbawah' => 'Memanfaatkan kreativitas untuk menyampaikan pesan yang berdampak dan menarik melalui kekuatan penceritaan audio-visual',
            'engtextbawah' => 'Harnessing creativity to deliver impactful and engaging messages through the power of audio-visual storytelling',
        ]);
    }
}
