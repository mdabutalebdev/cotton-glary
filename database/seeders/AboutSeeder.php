<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        About::updateOrCreate(
            ['id' => 1],
            [
                'eyebrow' => 'About Cotton Galary',
                'title' => 'Your Trusted Partner in Premium Cotton Apparel',
                'paragraph_1' => 'Cotton Galary is a global apparel development and sourcing partner, delivering sustainable, high-quality garments to leading brands across 25 countries. From concept to delivery, we bring newness, innovation and compliance excellence to every thread.',
                'paragraph_2' => 'With 800+ skilled team members and a network of 120+ fully compliant partner factories, we combine expert craftsmanship with responsible manufacturing — helping our clients grow with confidence and care.',
                'button_text' => 'About Us',
                'button_link' => '/about-us',
                'image' => null,
                'progress_title' => 'Our Progress So Far',
                'progress_stats' => [
                    ['value' => '120+', 'label' => 'Partner Factories'],
                    ['value' => '25+', 'label' => 'Countries Served'],
                    ['value' => '800+', 'label' => 'Skilled Team Members'],
                    ['value' => '15', 'label' => 'Years of Excellence'],
                    ['value' => '100%', 'label' => 'Compliant Factories'],
                    ['value' => '40%', 'label' => 'Sustainable Materials'],
                ],
            ]
        );
    }
}
