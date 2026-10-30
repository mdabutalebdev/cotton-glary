<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Seed the default hero banner (matches the original landing page).
     */
    public function run(): void
    {
        Banner::updateOrCreate(
            ['title' => 'Your Global Partner for Premium Cotton Apparel'],
            [
                'badge_text' => 'Sustainable Apparel',
                'highlight_text' => 'Premium Cotton',
                'description' => 'We offer sustainable garment product development and specialised global sourcing, combined with compliance excellence and intuitive customer service.',
                'sub_description' => 'We bring newness and innovation to every thread — an extensive multi-category range, manufactured in over 100 fully compliant partner factories.',
                'primary_button_text' => 'Explore Collections',
                'primary_button_link' => '#',
                'secondary_button_text' => 'Contact Sales',
                'secondary_button_link' => '#',
                'background_image' => null,
                'stats' => [
                    ['number' => '120', 'suffix' => '+', 'label' => 'Partner Factories'],
                    ['number' => '25', 'suffix' => '', 'label' => 'Countries Served'],
                    ['number' => '800', 'suffix' => '+', 'label' => 'Team Members'],
                    ['number' => '15', 'suffix' => '', 'label' => 'Years of Excellence'],
                ],
                'is_active' => true,
                'sort_order' => 0,
            ]
        );
    }
}
