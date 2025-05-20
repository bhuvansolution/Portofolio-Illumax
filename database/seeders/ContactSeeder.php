<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::updateOrCreate([
            'gambar' => 'contact.jpeg',
            'gambar1' => 'contact1.jpg',
            'whatsapp' => '123445',
            'email' => 'Test@gmail.com',
            'office' => 'Test',
            'phone' => '123445',
            'instagram' => 'instagram',
            'facebook' => 'facebook',
            'twitter' => 'twitter',
            'maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.368631370524!2d106.68895767475173!3d-6.34628789364354!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e5a6e26dc3cd%3A0xccd6344b8021119d!2sUniversitas%20Pamulang%20Kampus%202%20(UNPAM%20Viktor)!5e0!3m2!1sid!2sid!4v1746859764844!5m2!1sid!2sid',
            'textatas' => 'Mari terhubung! Hubungi kami untuk mengajukan pertanyaan, berkolaborasi, atau sekadar menyapa.',
            'engtextatas' => 'Let’s connect! Reach out to us for inquiries, collaborations, or just to say hello.',
            'textbawah' => 'Untuk informasi lebih lanjut atau pertanyaan bisnis, jangan ragu untuk menghubungi kami melalui email atau telepon',
            'engtextbawah' => 'For further information or business inquiries, please don’t hesitate to contact us via email or phone',
        ]);
    }
}
