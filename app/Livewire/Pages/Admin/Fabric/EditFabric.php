<?php

namespace App\Livewire\Pages\Admin\Fabric;

use Livewire\Attributes\Layout;
use Livewire\Component;

class EditFabric extends Component
{
     #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.fabric.edit-fabric');
    }
}
