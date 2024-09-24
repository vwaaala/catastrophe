<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => 'Health', 'status' => true]);
        Category::create(['name' => 'Education', 'status' => true]);
        Category::create(['name' => 'Infrastructure', 'status' => true]);
    }
}
