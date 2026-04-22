<?php

namespace App\Livewire\Pages\Admin\Fabric\Color;

use Livewire\Attributes\Layout;
use Livewire\Component;

class ViewColor extends Component
{
    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.fabric.color.view-color');
    }
}
