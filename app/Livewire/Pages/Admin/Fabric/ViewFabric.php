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
            ->select('id', 'name', 'description', 'image', 'created_at')
            ->get();
    }

    public function render()
    {
        return view('livewire.pages.admin.fabric.view-fabric');
    }
}
