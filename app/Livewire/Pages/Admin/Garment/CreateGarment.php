<?php

namespace App\Livewire\Pages\Admin\Garment;

use Livewire\Attributes\Layout;
use Livewire\Component;

class CreateGarment extends Component
{
     #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.garment.create-garment');
    }
}
