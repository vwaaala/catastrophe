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
            'uploads' => 'report1.jpg',
            'status' => false,
        ]);
        Report::create([
            'title' => 'Report 2',
            'description' => 'Description of report 2',
            'uploads' => 'report2.jpg',
            'status' => true,
        ]);
    }
}

