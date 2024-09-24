<?php

namespace Database\Seeders;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        Post::create([
            'title' => json_encode(['en' => 'First Post', 'fr' => 'Premier Post']),
            'description' => json_encode(['en' => 'This is the first post', 'fr' => 'Ceci est le premier post']),
            'media' => '1', // foreign key of media table in string
        ]);
    }
}
