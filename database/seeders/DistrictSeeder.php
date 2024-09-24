<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    public function run()
    {
        District::create(['name' => 'District 1', 'status' => true]);
        District::create(['name' => 'District 2', 'status' => true]);
        District::create(['name' => 'District 3', 'status' => true]);
    }
}

