<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
            $colors = [
            ['color_name' => 'Red', 'color_code' => '#FF0000'],
            ['color_name' => 'Green', 'color_code' => '#00FF00'],
            ['color_name' => 'Blue', 'color_code' => '#0000FF'],
            ['color_name' => 'Yellow', 'color_code' => '#FFFF00'],
            ['color_name' => 'Purple', 'color_code' => '#800080'],
            ['color_name' => 'Orange', 'color_code' => '#FFA500'],
            ['color_name' => 'Pink', 'color_code' => '#FFC0CB'],
            ['color_name' => 'Brown', 'color_code' => '#A52A2A'],
            ['color_name' => 'Gray', 'color_code' => '#808080'],
            ['color_name' => 'Black', 'color_code' => '#000000'],
            ['color_name' => 'White', 'color_code' => '#FFFFFF'],
            
        ];
        foreach ($colors as $color) {
            \App\Models\Color::create($color);
        }
    }
}
