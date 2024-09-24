<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            DistrictSeeder::class,
            ReportSeeder::class,
            PostSeeder::class,
            MediaSeeder::class,
            DonationSeeder::class,
            SettingSeeder::class,
        ]);
    }
}

