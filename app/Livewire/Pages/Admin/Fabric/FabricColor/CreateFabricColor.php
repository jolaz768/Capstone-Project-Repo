<?php

namespace App\Livewire\Pages\Admin\Fabric\FabricColor;

use App\Models\Color;
use App\Models\Fabric;
use App\Models\FabricColor;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.admin')]
class CreateFabricColor extends Component
{
    public int $fabric_id;
    public array $color_id = [];  


    public function rules()
    {
        return [
            'color_id'        => 'required|array|min:1',
            'color_id.*'      => 'exists:colors,id',
            'fabric_id'       => 'required|exists:fabrics,id',
        ];
    }

    public function messages()
    {
        return [
            'color_id.required'   => 'Select at least one color.',
            'color_id.*.exists'   => 'Invalid color selected.',
            'fabric_id.required'  => 'Fabric is required.',
            'fabric_id.exists'    => 'Selected fabric does not exist.',
        ];
    }

    public function save()
    {
        $this->validate();
        
        foreach ($this->color_id as $colorId) {
            FabricColor::firstOrCreate([
                'fabric_id' => $this->fabric_id,
                'color_id'  => $colorId,
            ]);
        }

        session()->flash('message', 'Fabric colors assigned successfully.');
        $this->reset(['color_id', 'fabric_id']);
    }

    public function render()
    {
        return view('livewire.pages.admin.fabric.fabric-color.create-fabric-color');
    }
}