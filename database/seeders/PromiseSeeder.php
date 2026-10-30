<?php

namespace Database\Seeders;

use App\Models\Promise;
use Illuminate\Database\Seeder;

class PromiseSeeder extends Seeder
{
    public function run(): void
    {
        Promise::updateOrCreate(
            ['id' => 1],
            [
                'values_intro' => 'Creating a positive impact has always been at the heart of Cotton Galary. From ethical sourcing to responsible manufacturing, our promise is simple — to deliver premium cotton apparel while caring for the people and the planet behind every garment.',
                'vision_intro' => 'Our vision is built on three commitments that guide everything we do.',
                'pillars' => [
                    ['icon' => 'fa-award', 'title' => 'Quality', 'subtitle' => 'Product Promise', 'description' => 'We take pride in every stitch. Our design and innovation teams work closely with clients to develop durable, comfortable and beautifully finished garments built to last.'],
                    ['icon' => 'fa-leaf', 'title' => 'Responsibility', 'subtitle' => 'Planet Promise', 'description' => 'We are committed to reducing our environmental footprint — from preferred sustainable fibres to responsible water, chemical and waste management across our partner factories.'],
                    ['icon' => 'fa-handshake', 'title' => 'Partnership', 'subtitle' => 'People Promise', 'description' => 'We invest in the people behind our products, championing fair, safe and ethical workplaces hand in hand with our compliant partner factories.'],
                ],
                'milestones' => [
                    ['year' => '2010', 'description' => 'Cotton Galary is founded in Bangladesh with a commitment to quality cotton apparel.'],
                    ['year' => '2014', 'description' => 'Onboarded our first fully compliant partner factories.'],
                    ['year' => '2017', 'description' => 'Expanded exports across international markets including the USA, Singapore and Malaysia.'],
                    ['year' => '2020', 'description' => 'Achieved key quality and sustainability certifications.'],
                    ['year' => '2023', 'description' => 'Grew to a network of 120+ partner factories serving clients in 25 countries.'],
                ],
                'stats' => [
                    ['value' => '100%', 'label' => 'Compliant Partner Factories'],
                    ['value' => '25+', 'label' => 'Countries Served'],
                    ['value' => '120+', 'label' => 'Partner Factories'],
                    ['value' => '15', 'label' => 'Years of Excellence'],
                ],
            ]
        );
    }
}
