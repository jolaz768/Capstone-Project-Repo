<?php

namespace App\Livewire\Pages\Admin\MeasurementTemplate;

use App\Models\MeasurementTemplate;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ViewMeasurementTemplate extends Component
{
     #[Layout('components.layouts.admin')]

     #[Computed()]

     public function MeasurementTemplates()
     {
        return MeasurementTemplate::query()
        ->select('id', 'name','garment_id','created_at')
        ->with('measurementFields')
        ->get();
     }
    public function render()
    {
        return view('livewire.pages.admin.measurement-template.view-measurement-template');
    }
}
