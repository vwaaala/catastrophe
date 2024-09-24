<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    public function run()
    {
        Media::create(['slug' => 'image1.jpg']);
        Media::create(['slug' => 'image2.jpg']);
    }
}

