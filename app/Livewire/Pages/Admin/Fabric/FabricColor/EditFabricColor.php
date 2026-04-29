<?php

namespace App\Livewire\Pages\Admin\Fabric\FabricColor;

use App\Models\Color;
use App\Models\Fabric;
use App\Models\FabricColor;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

class EditFabricColor extends Component
{
    #[Layout('components.layouts.admin')]

     public int $fabric_id;
    public array $color_id = [];  

public function mount(FabricColor $fabricColor)
    {
        $this->fabric_id = $fabricColor->fabric_id;
        $this->color_id = [$fabricColor->color_id]; 
    }

    #[Computed]
    public function colors()
    {
        return Color::query()->select('id', 'color_name')->get();
    }

    public function fabrics()
    {
        return Fabric::query()->select('id', 'name')->get();
    }

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
           $this->FabricColor->update([
                'fabric_id' => $this->fabric_id,
                'color_id'  => $colorId,
            ]);
        }

        session()->flash('message', 'Fabric colors assigned successfully.');
        $this->reset(['color_id', 'fabric_id']);
    }
    public function render()
    {
        return view('livewire.pages.admin.fabric.fabric-color.edit-fabric-color');
    }
}
