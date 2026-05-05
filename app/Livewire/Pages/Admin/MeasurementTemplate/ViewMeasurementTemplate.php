<?php

namespace App\Livewire\Pages\Admin\MeasurementTemplate;

use App\Models\MeasurementField;
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
        ->with('measurementFields:id,measurement_template_id,field_name,unit')
        ->get();
     }

     public function delete($id)
     {
        MeasurementTemplate::findOrFail($id)->delete();
        session()->flash('success', 'Measurement template deleted successfully.');
        return redirect()->route('admin.measurementtemplate.view');
     }
    //  #[Computed()]
    //  public function measurementFields()
    //  {
    //     return MeasurementField::query()
    //     ->select('id','field_name','unit')
    //     ->get();
    //  }
    public function render()
    {
        return view('livewire.pages.admin.measurement-template.view-measurement-template');
    }
}
