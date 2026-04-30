<?php

namespace App\Livewire\Pages\Admin\Service;

use App\Models\Service;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.admin')]
class EditService extends Component
{
    public $name;
    public $description;
    public $slug;
    public $service;
    public $serviceId;

    public function mount($id)
    {
        $this->serviceId = $id;
        $this->service = Service::findOrFail($id);
        $this->name = $this->service->name;
        $this->description = $this->service->description;
        $this->slug = $this->service->slug;
    }

    // Auto‑generate slug when name changes
    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    // Validation rules – ignore current record
    public function rules()
    {
        return [
            'name'        => 'required|min:3|max:50|unique:services,name,' . $this->serviceId,
            'description' => 'required|min:10|max:255',
            'slug'        => 'required|unique:services,slug,' . $this->serviceId,
        ];
    }

    public function messages()
    {
        return [
            'name.required'  => 'Service name is required',
            'name.min'       => 'Service name must be at least 3 characters',
            'name.max'       => 'Service name must not exceed 50 characters',
            'name.unique'    => 'Service name must be unique',

            'description.required' => 'Description is required',
            'description.min'      => 'Description must be at least 10 characters',
            'description.max'      => 'Description must not exceed 255 characters',

            'slug.required' => 'Slug is required',
            'slug.unique'   => 'Slug must be unique',
        ];
    }

    public function save()
    {
        $this->validate();

        // Sanitise inputs
        $this->name = Str::of(trim(strip_tags($this->name)))->title();
        $this->description = Str::of(trim(strip_tags($this->description)))->title();
        $this->slug = Str::slug($this->slug ?: $this->name); 

        // Update the existing model instance
        $this->service->update([
            'name'        => $this->name,
            'description' => $this->description,
            'slug'        => $this->slug,
        ]);

        session()->flash('message', 'Service updated successfully!');
        return redirect()->route('admin.service.view');
    }

    public function render()
    {
        return view('livewire.pages.admin.service.edit-service');
    }
}