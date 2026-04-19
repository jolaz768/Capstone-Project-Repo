<?php

namespace App\Livewire\Pages\Admin\MeasurementTemplate;

use Livewire\Attributes\Layout;
use Livewire\Component;

class CreateMeasurementTemplate extends Component
{
     #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.measurement-template.create-measurement-template');
    }
}
