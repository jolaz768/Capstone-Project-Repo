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
            ['color_name' => 'Teal', 'color_code' => '#008080'],
            ['color_name' => 'Navy', 'color_code' => '#000080'],
            ['color_name' => 'Maroon', 'color_code' => '#800000'],
            ['color_name' => 'Olive', 'color_code' => '#808000'],
            ['color_name' => 'Lime', 'color_code' => '#00FF00'],
            ['color_name' => 'Cyan', 'color_code' => '#00FFFF'],
            ['color_name' => 'Magenta', 'color_code' => '#FF00FF'],
            ['color_name' => 'Silver', 'color_code' => '#C0C0C0'],
            ['color_name' => 'Gold', 'color_code' => '#FFD700'],
            ['color_name' => 'Lavender', 'color_code' => '#E6E6FA'],
            ['color_name' => 'Coral', 'color_code' => '#FF7F50'],
            ['color_name' => 'Turquoise', 'color_code' => '#40E0D0'],
            ['color_name' => 'Indigo', 'color_code' => '#4B0082'],
            ['color_name' => 'Violet', 'color_code' => '#EE82EE'],
            ['color_name' => 'Salmon', 'color_code' => '#FA8072'],
            ['color_name' => 'Khaki', 'color_code' => '#F0E68C'],
            ['color_name' => 'Plum', 'color_code' => '#DDA0DD'],
            ['color_name' => 'Orchid', 'color_code' => '#DA70D6'],
        ];
        foreach ($colors as $color) {
            \App\Models\Color::create($color);
        }
    }
}
