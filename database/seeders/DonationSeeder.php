<?php

namespace Database\Seeders;

use App\Models\Donation;
use Illuminate\Database\Seeder;

class DonationSeeder extends Seeder
{
    public function run()
    {
        Donation::create([
            'transactionid' => 'TXN12345',
            'amount' => 100.50,
            'status' => true,
            'name' => 'John Doe',
            'phone' => '1234567890',
            'email' => 'john@example.com',
        ]);

        Donation::create([
            'transactionid' => 'TXN67890',
            'amount' => 50.00,
            'status' => false,
            'name' => 'Jane Doe',
            'phone' => '0987654321',
            'email' => 'jane@example.com',
        ]);
    }
}

