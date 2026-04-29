<?php

namespace App\Livewire\Pages\Admin\Fabric\FabricColor;

use App\Models\Fabric;
use App\Models\FabricColor;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ViewFabricColor extends Component
{
    #[Layout('components.layouts.admin')]

    public int $fabric_id;
    public array $color_id = [];


    #[Computed()]
    public function fabrics()
    {
        return Fabric::with('colors')->get();
    }
    public function getColorDisplay($fabric)
{
    $names = $fabric->colors->pluck('color_name');
    $total = $names->count();
    $display = $names->take(5)->implode(', ');
    return (object) [
        'html' => $display . ($total > 5 ? ' ... (' . $total . ')' : ($total ? ' (' . $total . ')' : '')),
        'full' => $names->implode(', ')
    ];
}
    public function render()
    {
        return view('livewire.pages.admin.fabric.fabric-color.view-fabric-color');
    }
}
