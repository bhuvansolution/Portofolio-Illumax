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
            'gambar' => 'service.jpg',
            'textatas' => 'Mengubah kreativitas menjadi media untuk menyampaikan pesan yang menarik dan bermakna melalui penceritaan audiovisual.',
            'engtextatas' => 'Turning creativity into a medium for delivering captivating and meaningful messages through audiovisual storytelling.',
            'title' => '["Company Profile"]',
            'description' => '["Kami membantu Anda membuat company profile yang profesional dan menarik untuk memperkenalkan perusahaan Anda kepada audiens. Dengan company profile yang baik, Anda dapat meningkatkan kesadaran dan kredibilitas perusahaan Anda"]',
            'engtitle' => '["Company Profile"]',
            'engdescription' => '["We help you create a professional and attractive company profile to introduce your company to the audience. With a good company profile, you can increase your company awareness and credibility."]'
        ]);
    }
}
