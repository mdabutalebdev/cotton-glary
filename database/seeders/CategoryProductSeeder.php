<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoryProductSeeder extends Seeder
{
    /**
     * Seed garment categories with sample products (placeholder images).
     */
    public function run(): void
    {
        $data = [
            'Chefwear' => ['Chef Shirt', 'Chef Jacket', 'Bib Apron', 'Chef Trousers', 'Skull Cap', 'Kitchen Coat', 'Waist Apron', 'Server Vest'],
            'Dresses / Jumpsuits' => ['Wrap Dress', 'Maxi Dress', 'Denim Jumpsuit', 'Shirt Dress', 'Slip Dress', 'Cargo Jumpsuit', 'Midi Dress', 'Playsuit'],
            'Footwear' => ['Canvas Sneaker', 'Leather Loafer', 'Slip-On Shoe', 'Espadrille', 'Ankle Boot', 'Strap Sandal', 'Running Shoe', 'Derby Shoe'],
            'Innerwear' => ['Cotton Brief', 'Boxer Shorts', 'Camisole', 'Bralette', 'Thermal Vest', 'Seamless Panty', 'Sports Bra', 'Cotton Trunk'],
            'Jackets / Coats' => ['Denim Jacket', 'Bomber Jacket', 'Trench Coat', 'Puffer Jacket', 'Tailored Blazer', 'Hooded Parka', 'Windbreaker', 'Wool Overcoat'],
            'Knit Bottoms' => ['Jogger Pants', 'Knit Shorts', 'Track Pants', 'Leggings', 'Knit Culottes', 'Lounge Pants', 'Ribbed Trousers', 'Sweat Shorts'],
            'Knit Tops' => ['Crew Tee', 'Polo Shirt', 'Henley Top', 'Tank Top', 'Long Sleeve Tee', 'Raglan Tee', 'V-Neck Tee', 'Pocket Tee'],
            'Knitwear (Flat Knit)' => ['Cable Sweater', 'Crew Pullover', 'Turtleneck', 'Button Cardigan', 'V-Neck Sweater', 'Knit Vest', 'Zip Sweater', 'Roll Neck'],
            'Nightwear' => ['Pajama Set', 'Night Dress', 'Sleep Shorts', 'Cotton Robe', 'Lounge Set', 'Sleep Tee', 'Kimono Robe', 'Knit Onesie'],
            'Outerwear' => ['Raincoat', 'Quilted Gilet', 'Fleece Jacket', 'Softshell Jacket', 'Anorak', 'Field Jacket', 'Rain Poncho', 'Wool Cape'],
            'Shirts' => ['Oxford Shirt', 'Flannel Shirt', 'Linen Shirt', 'Denim Shirt', 'Formal Shirt', 'Check Shirt', 'Grandad Shirt', 'Camp Collar Shirt'],
            'Sportswear' => ['Training Tee', 'Compression Top', 'Track Jacket', 'Running Shorts', 'Sports Legging', 'Gym Tank', 'Windbreaker Pant', 'Base Layer'],
            'Sweaters' => ['Marl Jumper', 'Chunky Knit', 'Fair Isle Sweater', 'Crewneck Jumper', 'Waffle Knit', 'Mohair Sweater', 'Ribbed Jumper', 'Colourblock Knit'],
            'Swimwear' => ['Swim Shorts', 'Bikini Set', 'One-Piece Swimsuit', 'Rash Guard', 'Board Shorts', 'Swim Brief', 'Tankini', 'Swim Dress'],
            'T-Shirts' => ['Basic Tee', 'Oversized Tee', 'Graphic Tee', 'Striped Tee', 'Ringer Tee', 'Slim Fit Tee', 'Boxy Tee', 'Heavyweight Tee'],
            'Trousers' => ['Chino Trouser', 'Cargo Pant', 'Formal Trouser', 'Wide-Leg Pant', 'Slim Trouser', 'Pleated Pant', 'Corduroy Pant', 'Tapered Trouser'],
            'Woven Bottoms' => ['Woven Short', 'Culotte', 'Palazzo Pant', 'Utility Pant', 'Bermuda Short', 'Paperbag Trouser', 'Woven Jogger', 'Skort'],
            'Woven Tops' => ['Classic Blouse', 'Peplum Top', 'Tunic Top', 'Wrap Top', 'Halter Top', 'Kaftan Top', 'Smock Top', 'Off-Shoulder Top'],
        ];

        $catOrder = 0;
        $counter = 0;

        foreach ($data as $categoryName => $products) {
            $category = Category::updateOrCreate(
                ['slug' => Str::slug($categoryName)],
                ['name' => $categoryName, 'sort_order' => $catOrder++, 'is_active' => true]
            );

            $i = 0;
            foreach ($products as $productName) {
                $i++;
                $counter++;
                Product::updateOrCreate(
                    ['design_code' => sprintf('CG_DESIGN_%05d', $counter)],
                    [
                        'category_id' => $category->id,
                        'name' => $productName,
                        'sort_order' => $i,
                        'is_active' => true,
                    ]
                );
            }
        }
    }
}
