<?php

namespace App\Livewire\Pages\Admin\Service;

use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('components.layouts.admin')]
class EditService extends Component
{
      use WithFileUploads;

    public $name;
    public $description;
    public $image;                 // temporary uploaded file (new)
    public $existing_image;       // current image path from DB
    public $service;
    public $serviceId;

    public function mount($id)
    {
        $this->serviceId = $id;
        $this->service = Service::where('id', $id)
            ->whereHas('shop.users', fn ($query) => $query->where('users.id', auth()->id()))
            ->firstOrFail();

        $this->name = $this->service->name;
        $this->description = $this->service->description;
        $this->existing_image = $this->service->image;
    }

    public function rules()
    {
        return [
            'name'        => 'required|min:3|max:50|unique:services,name,' . $this->serviceId,
            'description' => 'required|min:10|max:255',
            'image'       => 'nullable|image|max:2048', // new image validation
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
            'image.image'          => 'The file must be an image',
            'image.max'            => 'Image size must not exceed 2MB',
        ];
    }

    public function save()
    {
        $this->validate();

        $this->name = Str::of(trim(strip_tags($this->name)))->title();
        $this->description = Str::of(trim(strip_tags($this->description)))->title();

        $imagePath = $this->existing_image;

        // If a new image was uploaded
        if ($this->image) {
            // Delete old image if exists
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            // Store new image
            $imagePath = $this->image->store('services', 'public');
        }

        $this->service->update([
            'name'        => $this->name,
            'description' => $this->description,
            'image'       => $imagePath,
        ]);

        session()->flash('message', 'Service updated successfully!');
        return redirect()->route('admin.service.view');
    }

    public function render()
    {
        return view('livewire.pages.admin.service.edit-service');
    }
}