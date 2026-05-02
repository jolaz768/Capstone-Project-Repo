<?php

namespace App\Livewire\Pages\Admin\Fabric;

use App\Models\Color;
use App\Models\Fabric;
use App\Models\FabricColor;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ViewFabric extends Component
{
     #[Layout('components.layouts.admin')]
    public $name ;
    public $description ;
    public $image;


    #[Computed()]
    public function fabrics()
    {
        return Fabric::query()
            ->select('id', 'name', 'description','price', 'image', 'created_at')
            ->with('colors')
            ->get();
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

    public function delete($id)
    {
        $fabric = Fabric::findOrFail($id);
        $fabric->delete();
        session()->flash('message', 'Fabric deleted successfully.');
    }

    public function render()
    {
        return view('livewire.pages.admin.fabric.view-fabric');
    }
}
