<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AboutSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(OurServiceSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(HomepageSeeder::class);
        $this->call(WhyChooseSeeder::class);
        $this->call(GalleryPageSeeder::class);
        $this->call(PortoPageSeeder::class);
        $this->call(RoleSeeder::class);
    }
}
