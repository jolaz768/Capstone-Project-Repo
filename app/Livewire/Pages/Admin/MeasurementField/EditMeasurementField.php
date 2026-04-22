<?php

namespace App\Livewire\Pages\Admin\MeasurementField;

use Livewire\Attributes\Layout;
use Livewire\Component;

class EditMeasurementField extends Component
{
    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.measurement-field.edit-measurement-field');
    }
}
