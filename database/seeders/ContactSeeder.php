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
            'whatsapp' => '123445',
            'email' => 'Test@gmail.com',
            'office' => 'Test',
            'phone' => '123445',
            'textatas' => 'textatas',
            'engtextatas' => 'engtextatas',
            'textbawah' => 'textbawah',
            'engtextbawah' => 'engtextbawah',
        ]);
    }
}
