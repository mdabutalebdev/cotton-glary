<?php

namespace Database\Seeders;

use App\Models\Certification;
use Illuminate\Database\Seeder;

class CertificationSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['name' => 'ISO 9001:2015', 'image' => 'uploads/marque image/1_1.png', 'description' => 'An internationally recognised quality management standard, reflecting our commitment to consistent processes and continual improvement.'],
            ['name' => 'GOTS', 'image' => 'uploads/marque image/3_1.png', 'description' => 'The Global Organic Textile Standard — a leading benchmark for textiles made from organic fibres, covering both ecological and social criteria.'],
            ['name' => 'Global Recycled Standard', 'image' => 'uploads/marque image/4_3.png', 'description' => 'Independently verifies recycled content in our products, together with responsible environmental, social and chemical practices.'],
            ['name' => 'EcoVadis', 'image' => 'uploads/marque image/8_2.png', 'description' => 'A trusted sustainability rating that assesses environmental, social and ethical performance across the supply chain.'],
            ['name' => 'Higg Index', 'image' => 'uploads/marque image/9_1.png', 'description' => 'A set of tools used to measure and improve the environmental and social impact of products and facilities.'],
            ['name' => 'Friend of ZDHC', 'image' => 'uploads/marque image/Friend of ZDHC.png', 'description' => 'Supporting the Zero Discharge of Hazardous Chemicals programme for safer chemical management in manufacturing.'],
            ['name' => 'OEKO-TEX Standard 100', 'image' => 'uploads/marque image/OEKO-TEX-Standard-100.png', 'description' => 'Confirms that our textiles have been tested for harmful substances and are safe for everyday use.'],
            ['name' => 'Textile Exchange', 'image' => 'uploads/marque image/TE_New_0.png', 'description' => 'A global non-profit we work with to accelerate the shift towards more sustainable fibres and materials.'],
        ];

        foreach ($data as $i => $cert) {
            Certification::updateOrCreate(
                ['name' => $cert['name']],
                [
                    'description' => $cert['description'],
                    'image' => $cert['image'],
                    'sort_order' => $i,
                    'is_active' => true,
                ]
            );
        }
    }
}
