<?php

namespace App\Livewire\Pages\Admin\Fabric;

use App\Models\Color;
use App\Models\Fabric;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditFabric extends Component
{
     use WithFileUploads;

    public $fabric;              // ✅ Store model instance
    public $name;
    public $description;
    public $image;               // ✅ Only for new upload
    public $existingImage;       // ✅ Store existing image path
    public array $color_id = [];

    public function mount($id)
    {
        $this->fabric = Fabric::findOrFail($id);
        $this->name = $this->fabric->name;
        $this->description = $this->fabric->description;
        $this->existingImage = $this->fabric->image;
        $this->image = null;     // ✅ Clear any previous upload
        $this->color_id = $this->fabric->colors()->pluck('colors.id')->toArray();
    }

    #[Computed]
    public function colors()
    {
        return Color::query()->select('id', 'color_name')->get();
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',   // ✅ Fixed: removed nullable
            'image' => 'nullable|image|max:2048', // ✅ Fixed: removed required
            'color_id' => 'required|array|min:1',
            'color_id.*' => 'exists:colors,id',
        ];
    }

    public function messages()   // ✅ Correct method name
    {
        return [
            'name.required' => 'Fabric name is required',
            'name.string' => 'Fabric name must be a string',
            'name.max' => 'Fabric name must not exceed 255 characters',
            'description.required' => 'Description is required',
            'description.string' => 'Description must be a string',
            'image.image' => 'The file must be an image',
            'image.max' => 'The image must not exceed 2MB in size',
            'color_id.required' => 'Select at least one color for this fabric.',
            'color_id.array' => 'Color selection must be valid.',
            'color_id.*.exists' => 'One of the selected colors is invalid.',
        ];
    }

    public function save()     // ✅ Better method name
    {
        $this->validate();

        // Handle image: keep existing if no new file uploaded
        $imagePath = $this->existingImage;
        if ($this->image) {
            $imagePath = $this->image->store('fabrics', 'public');
        }

        $this->fabric->update([
            'name' => Str::of($this->name)->trim()->title(),
            'description' => Str::of($this->description)->trim(),
            'image' => $imagePath,
        ]);

        $this->fabric->colors()->sync($this->color_id);

        session()->flash('message', 'Fabric updated successfully.');
        return redirect()->route('admin.fabric.view');
    }
     #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.fabric.edit-fabric');
    }
}
