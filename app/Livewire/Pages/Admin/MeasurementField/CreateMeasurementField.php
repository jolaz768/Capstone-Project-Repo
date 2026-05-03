<?php

namespace App\Livewire\Pages\Admin\MeasurementField;

use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;


class CreateMeasurementField extends Component
{
    #[Layout('components.layouts.admin')]
    public array $measuremnent_fields = [];
    public string $field_name = '';
    public string $unit = '';    

    public function rules()
    {
        return [
            'field_name' => 'required|string|max:255',
            'unit' => 'required|string|min:0|max:10',
            'measurement_fields' => 'required|array',
        ];
    }
    public function messages()
    {
        return [
            'field_name.required' => 'Measurement field name is required',
            'field_name.string' => 'Measurement field name must be a string',
            'field_name.max' => 'Measurement field name must not exceed 255 characters',

            'unit.required' => 'Unit is required',
            'unit.string' => 'Unit must be a string',
            'unit.min' => 'Unit must be at least 0',
            'unit.max' => 'Unit must not exceed 10 characters',

            'measurement_fields.required' => 'Measurement fields are required',
            'measurement_fields.array' => 'Measurement fields must be an array',
        ];
    }

    public function save()
    {
        $this->validate();
        $this->field_name = Str::of($this->field_name)->trim()->title();
        $this->unit = floatval($this->unit);

        \App\Models\MeasurementField::create([
            'field_name' => $this->field_name,
            'unit' => $this->unit,
        ]);

        session()->flash('success', 'Measurement field created successfully!');
        return redirect()->route('admin.measurementfield.view');
    }

    public function render()
    {
        return view('livewire.pages.admin.measurement-field.create-measurement-field');
    }
}
