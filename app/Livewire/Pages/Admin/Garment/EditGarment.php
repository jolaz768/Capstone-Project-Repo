<?php

namespace App\Livewire\Pages\Admin\Garment;

use Livewire\Attributes\Layout;
use Livewire\Component;

class EditGarment extends Component
{
     #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.garment.edit-garment');
    }
}
