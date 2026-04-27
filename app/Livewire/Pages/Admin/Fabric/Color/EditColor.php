<?php

namespace App\Livewire\Pages\Admin\Fabric\Color;

use App\Models\Color;
use Livewire\Attributes\Layout;
use Livewire\Component;

class EditColor extends Component
{
    public $color_name = '';
    public $color_code = '#000000';
    public $color;

    public function mount(Color $color)
    {
        $this->color = $color;
        $this->color_name = $color->color_name;
        $this->color_code = $color->color_code;
    }

    public function updatedColorName($name)
    {
        $hex = $this->colorNameToHex($name);

        if ($hex) {
            $this->color_code = $hex;
        }
    }

    public function updatedColorCode($hex)
    {
        $this->color_name = $this->hexToColorName($hex);
    }

    private function colorNameToHex($name)
    {
        $map = [
            'black' => '#000000',
            'white' => '#FFFFFF',
            'red' => '#FF0000',
            'green' => '#00FF00',
            'blue' => '#0000FF',
            'yellow' => '#FFFF00',
            'magenta' => '#FF00FF',
            'cyan' => '#00FFFF',
            'maroon' => '#800000',
            'olive' => '#808000',
            'dark green' => '#008000',
            'purple' => '#800080',
            'teal' => '#008080',
            'navy' => '#000080',
            'orange' => '#FFA500',
            'brown' => '#A52A2A',
            'pink' => '#FFC0CB',
            'gray' => '#808080',
        ];

        $key = strtolower(trim($name));

        return $map[$key] ?? null;
    }

    private function hexToColorName($hex)
    {
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
        ];

        $hex = strtoupper(trim($hex));

        return $map[$hex] ?? 'Custom Color';
    }

    public function rules()
    {
        return [
            'color_name' => 'required|unique:colors,color_name,' . $this->color->id . '|string|max:255',
            'color_code' => 'required|unique:colors,color_code,' . $this->color->id . '|string|max:255',
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

    public function save()
    {
        $this->validate();

        $this->color->update([
            'color_name' => $this->color_name,
            'color_code' => $this->color_code,
        ]);

        session()->flash('message', 'Color updated successfully.');

        return redirect()->route('admin.color.view');
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.fabric.color.edit-color');
    }
}
