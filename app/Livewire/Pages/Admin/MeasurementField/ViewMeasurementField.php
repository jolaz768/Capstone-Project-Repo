<?php

namespace App\Livewire\Pages\Admin\MeasurementField;

use Livewire\Attributes\Layout;
use Livewire\Component;

class ViewMeasurementField extends Component
{
    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.measurement-field.view-measurement-field');
    }
}
