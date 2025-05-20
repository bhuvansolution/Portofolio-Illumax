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
            'textatas' => 'Membuat Kreativitas Sebuah alat untuk menyampaikan pesan yang indah, menarik dan luas melalui audio visual',
            'judul' => 'Di Balik Lensa',
            'description' => '<p>llumax adalah production house yang di payungi oleh PT. Rinjani Astha Kreatif, yang didirikan oleh tiga orang professional dan berkompeten dalam dunia kreatif audio visual.<br><br>Komitmen, fleksibilitas, dan rasa dijadikan pondasi untuk mengerjakan sebuah karya, yang menjadikan Illumax dapat bertanggung jawab, mempunyai kemampuan penyesuaian diri untuk memenuhi harapan dalam sebuah project, dan mengerjakan semua dengan rasa agar pesan yang di sampaikan dalam sebuah karya, produk, atau hasil yang lebih hidup agar cepat di mengerti oleh audience.<br><br>Kami memiliki tenaga professional, berkompeten dan mempunyai kredibilitas yang tinggi dalam mengerjakan sebuah project.</p>',
            'textbawah' => 'Memanfaatkan kreativitas untuk menyampaikan pesan yang berdampak dan menarik melalui kekuatan penceritaan audio-visual',
            'engtextatas' => 'Making Creativity A tool to convey beautiful, interesting and wide messages through audio visual',
            'engjudul' => 'Behind The Lens',
            'engdescription' => '<p>llumax is a production house under the umbrella of PT. Rinjani Astha Kreatif, which was founded by three professionals and competent in the creative world of audio visual.<br><br>Commitment, flexibility, and taste are used as the foundation for working on a work, which makes Illumax responsible, has the ability to adapt to meet expectations in a project, and does everything with taste so that the message conveyed in a work, product, or result is more alive so that it is quickly understood by the audience.<br><br>We have professional, competent and highly credible staff in working on a project.</p>',
            'engtextbawah' => 'Harnessing creativity to deliver impactful and engaging messages through the power of audio-visual storytelling',
            'banneratas' => 'banneratas.jpeg',
            'gambar1' => 'about-us1.jpg',
            'gambar' => 'about-us.jpg',
            'bannerbawah' => 'bannerbawah.jpeg',
        ]);
    }
}
