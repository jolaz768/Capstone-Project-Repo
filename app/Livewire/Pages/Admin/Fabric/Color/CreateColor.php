<?php

namespace App\Livewire\Pages\Admin\Fabric\Color;

use Livewire\Attributes\Layout;
use Livewire\Component;

class CreateColor extends Component
{
    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.fabric.color.create-color');
    }
}
