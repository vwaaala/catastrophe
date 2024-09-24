<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run()
    {
        Setting::create([
            'contact_email' => 'admin@example.com',
            'contact_phone' => '1234567890',
            'payment_url' => 'https://payment.example.com',
            'payment_store' => 'Store123',
            'payment_signature' => 'Signature123',
        ]);
    }
}

