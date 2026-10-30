<?php

namespace Database\Seeders;

use App\Models\Owner;
use Illuminate\Database\Seeder;

class OwnerSeeder extends Seeder
{
    public function run(): void
    {
        Owner::updateOrCreate(
            ['id' => 1],
            [
                'eyebrow' => 'Meet the Owner',
                'name' => 'Md. Abdul Karim',
                'designation' => 'Proprietor & CEO, Cotton Galary',
                'paragraph_1' => 'Md. Abdul Karim leads Cotton Galary with a clear vision — to deliver premium, sustainable cotton apparel that global brands can trust. His hands-on approach and deep industry knowledge shape every partnership the company builds.',
                'paragraph_2' => 'From a single workshop to a network of fully compliant partner factories serving clients across 25 countries, his commitment to craftsmanship, fair manufacturing and lasting relationships continues to move the company forward.',
                'phone' => '+880 1700-000000',
                'email' => 'info@cottongalary.com',
                'image' => null,
            ]
        );
    }
}
