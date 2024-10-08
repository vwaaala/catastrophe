<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    public function run()
    {
        Report::create([
            'title' => 'Report 1',
            'description' => 'Description of report 1',
            'uploads' => '1',
            'status' => false,
        ]);
        Report::create([
            'title' => 'Report 2',
            'description' => 'Description of report 2',
            'uploads' => '2',
            'status' => true,
        ]);
    }
}

