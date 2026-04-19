<?php

namespace App\Livewire\Pages\Admin\Fabric;

use Livewire\Attributes\Layout;
use Livewire\Component;

class CreateFabric extends Component
{
     #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.fabric.create-fabric');
    }
}
