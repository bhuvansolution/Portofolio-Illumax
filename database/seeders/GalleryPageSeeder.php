<?php

namespace Database\Seeders;

use App\Models\GalleryPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GalleryPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GalleryPage::updateOrCreate([
            'gambar' => 'gallerypage.jpeg',
            'gambar1' => 'gallerypage1.jpeg',
            'textatas' => 'Kami percaya bahwa kreativitas, jika dipadukan dengan cerita audiovisual, menjadi bahasa universal emosi dan dampak',
            'engtextatas' => 'We believe that creativity, when paired with audiovisual storytelling, becomes a universal language of emotion and impactx',
            'textbawah' => 'Memanfaatkan kreativitas untuk menyampaikan pesan yang berdampak dan menarik melalui kekuatan penceritaan audio-visual',
            'engtextbawah' => 'Harnessing creativity to deliver impactful and engaging messages through the power of audio-visual storytelling',
            'quote' => '<p>Menurutmu kami keren?<br>Mari Bekerja Sama</p>',
            'engquote' => '<p>Your Think We Are cool ?<br>Lets Work Together</p>',
        ]);
    }
}
