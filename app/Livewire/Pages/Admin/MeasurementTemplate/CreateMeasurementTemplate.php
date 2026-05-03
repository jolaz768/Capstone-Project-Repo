<?php

namespace App\Livewire\Pages\Admin\MeasurementTemplate;

use App\Models\Garment;
use App\Models\MeasurementField;
use App\Models\MeasurementTemplate;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CreateMeasurementTemplate extends Component
{
    #[Layout('components.layouts.admin')]

    public ?int $garment_id = null;
    public string $name = '';
    
    // Dynamic fields array: each item has 'field_name' and 'unit'
    public array $fields = [];

    public function mount()
    {
        // Start with one empty field row
        $this->addField();
    }

    public function addField()
    {
        $this->fields[] = ['field_name' => '', 'unit' => ''];
    }

    public function removeField($index)
    {
        unset($this->fields[$index]);
        $this->fields = array_values($this->fields);
    }

    #[Computed()]
    public function garments()
    {
        return Garment::query()->select('id', 'name', 'image')->get();
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255|min:3',
            'garment_id' => 'required|exists:garments,id',
            'fields' => 'required|array|min:1',
            'fields.*.field_name' => 'required|string|max:255',
            'fields.*.unit' => 'required|string|max:50',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Measurement template name is required.',
            'name.string' => 'Measurement template name must be a string.',
            'name.max' => 'Measurement template name must not exceed 255 characters.',
            'name.min' => 'Measurement template name must be at least 3 characters.',

            'garment_id.required' => 'Garment is required.',
            'garment_id.exists' => 'Selected garment does not exist.',

            'fields.required' => 'At least one measurement field is required.',
            'fields.*.field_name.required' => 'Each field must have a name.',
            'fields.*.field_name.max' => 'Field name cannot exceed 255 characters.',
            'fields.*.unit.required' => 'Each field must have a unit.',
            'fields.*.unit.max' => 'Unit cannot exceed 50 characters.',
        ];
    }

    public function save()
    {
        $this->validate();

        DB::transaction(function () {
            // 1. Create the template
            $template = MeasurementTemplate::create([
                'name' => Str::of($this->name)->trim()->title(),
                'garment_id' => $this->garment_id,
            ]);

            // 2. Create all fields linked to this template
            foreach ($this->fields as $field) {
                MeasurementField::create([
                    'measurement_template_id' => $template->id,
                    'field_name' => trim($field['field_name']),
                    'unit' => trim($field['unit']),
                ]);
            }
        });

        session()->flash('success', 'Measurement template and fields created successfully.');
        return redirect()->route('admin.measurementtemplate.view');
    }

    public function render()
    {
        return view('livewire.pages.admin.measurement-template.create-measurement-template');
    }
}