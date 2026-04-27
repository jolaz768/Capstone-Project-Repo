<?php

namespace Database\Seeders;

use App\Models\Fabric;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FabricSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $fabrics = [
            [
                'id' => 1,
                'name' => 'Cotton',
                'image' => 'fabrics/cotton.jpg',
                'description' => 'Soft, breathable, and comfortable fabric ideal for casual wear.',
            ],
            [
                'id' => 2,
                'name' => 'Silk',
                'image' => 'fabrics/silk.jpg',
                'description' => 'Smooth and luxurious fabric commonly used for formal and elegant garments.',
            ],
            [
                'id' => 3,
                'name' => 'Linen',
                'image' => 'fabrics/linen.jpg',
                'description' => 'Lightweight and breathable fabric perfect for warm climates and summer outfits.',
            ],
            [
                'id' => 4,
                'name' => 'Denim',
                'image' => 'fabrics/denim.jpg',
                'description' => 'Durable cotton fabric commonly used for jeans, jackets, and workwear.',
            ],
            [
                'id' => 5,
                'name' => 'Wool',
                'image' => 'fabrics/wool.jpg',
                'description' => 'Warm and insulating fabric suitable for coats, sweaters, and cold-weather clothing.',
            ],
            [
                'id' => 6,
                'name' => 'Polyester',
                'image' => 'fabrics/polyester.jpg',
                'description' => 'Synthetic fabric known for durability, wrinkle resistance, and easy maintenance.',
            ],
            [
                'id' => 7,
                'name' => 'Rayon',
                'image' => 'fabrics/rayon.jpg',
                'description' => 'Soft semi-synthetic fabric with a smooth texture and comfortable drape.',
            ],
            [
                'id' => 8,
                'name' => 'Velvet',
                'image' => 'fabrics/velvet.jpg',
                'description' => 'Soft and elegant fabric with a rich textured surface, often used in luxury wear.',
            ],
            [
                'id' => 9,
                'name' => 'Chiffon',
                'image' => 'fabrics/chiffon.jpg',
                'description' => 'Lightweight sheer fabric commonly used in dresses, scarves, and overlays.',
            ],
            [
                'id' => 10,
                'name' => 'Satin',
                'image' => 'fabrics/satin.jpg',
                'description' => 'Glossy and smooth fabric often used for gowns, dresses, and formal wear.',
            ],
        ];

        foreach ($fabrics as $fabric) {
            Fabric::create($fabric);
        }
    }
    
}
