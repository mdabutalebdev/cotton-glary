<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        Contact::updateOrCreate(
            ['id' => 1],
            [
                'intro' => 'Have a question or a project in mind? We would love to hear from you — reach out and our team will get back to you shortly.',
                'address' => 'Dhaka, Bangladesh',
                'phone' => '+880 1700-000000',
                'email' => 'info@cottongalary.com',
                'hours' => 'Saturday – Thursday, 9:00 AM – 6:00 PM',
                'map_embed' => null,
            ]
        );
    }
}
