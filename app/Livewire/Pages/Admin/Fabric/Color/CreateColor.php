<?php

namespace App\Livewire\Pages\Admin\Fabric\Color;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Color;

class CreateColor extends Component
{   
   public $color_name = '';
    public $color_code = '#000000';

    // Automatically called when $color_code is updated
    public function updatedColorCode($hex)
    {
        $this->color_name = $this->hexToColorName($hex);
    }

    private function hexToColorName($hex)
    {
        // Simple built‑in mapping for common colors
        $map = [
            '#000000' => 'Black',
            '#FFFFFF' => 'White',
            '#FF0000' => 'Red',
            '#00FF00' => 'Green',
            '#0000FF' => 'Blue',
            '#FFFF00' => 'Yellow',
            '#FF00FF' => 'Magenta',
            '#00FFFF' => 'Cyan',
            '#800000' => 'Maroon',
            '#808000' => 'Olive',
            '#008000' => 'Dark Green',
            '#800080' => 'Purple',
            '#008080' => 'Teal',
            '#000080' => 'Navy',
            '#FFA500' => 'Orange',
            '#A52A2A' => 'Brown',
            '#FFC0CB' => 'Pink',
            '#808080' => 'Gray',
            '#C0C0C0' => 'Silver',
            '#FFD700' => 'Gold',
            '#E6E6FA' => 'Lavender',
            '#FF7F50' => 'Coral',
            '#40E0D0' => 'Turquoise',
            '#4B0082' => 'Indigo',
            '#EE82EE' => 'Violet',
            '#FA8072' => 'Salmon',
            '#F0E68C' => 'Khaki',
            '#DDA0DD' => 'Plum',
            '#DA70D6' => 'Orchid',
            '#FFC0CB' => 'Pink',
            '#FF69B4' => 'Hot Pink',
            '#FF1493' => 'Deep Pink',
            '#FF4500' => 'Orange Red',
            '#FF6347' => 'Tomato',
            '#FF8C00' => 'Dark Orange',
            '#FFB6C1' => 'Light Pink',  
            
        ];

        $hex = strtoupper($hex);
        return $map[$hex] ?? 'Custom Color';
    }

    public function rules()
    {
        return [
            'color_name' => 'required|unique:colors,color_name|string|max:255',
            'color_code' => 'required|unique:colors,color_code|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'color_name.required' => 'Color name is required',
            'color_name.string' => 'Color name must be a string',
            'color_name.max' => 'Color name must be at most 255 characters',

            'color_code.required' => 'Color code is required',
            'color_code.string' => 'Color code must be a string',
            'color_code.max' => 'Color code must be at most 255 characters',
        ];
    }

    public function save(){
        $this->validate();
        

        Color::create([
            'color_name' => $this->color_name,
            'color_code' => $this->color_code,
        ]);

        session()->flash('message', 'Color created successfully.');

        return redirect()->route('admin.color.view');
    }
    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.fabric.color.create-color');
    }
}
