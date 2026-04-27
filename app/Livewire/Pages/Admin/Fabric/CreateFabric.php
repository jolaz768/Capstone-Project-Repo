<?php

namespace App\Livewire\Pages\Admin\Fabric;

use App\Models\Fabric;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;


class CreateFabric extends Component
{
    use WithFileUploads;

    public $name ;
    public $description ;
    public $image;

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255|min:10',
            'image' => 'required|image|max:2048', // Max 2MB
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Fabric name is required',
            'name.string' => 'Fabric name must be a string',
            'name.max' => 'Fabric name must not exceed 255 characters',

            'description.string' => 'Description must be a string',
            'description.required' => 'Description is required',
            'description.max' => 'Description must not exceed 255 characters',
            'description.min' => 'Description must be at least 10 characters',

            'image.required' => 'Image is required',
            'image.image' => 'The file must be an image',
            'image.max' => 'The image must not exceed 2MB in size',
        ];
    }


    public function save()
    {
        $this->validate();
        

        $name = Str::of($this->name)->trim()->title();
        $description = Str::of($this->description)->trim();
        $imagePath = $this->image ? $this->image->store('fabrics', 'public') : null;

        Fabric::create([
            'name' => $name,
            'image' => $imagePath,
            'description' => $description,
        ]);

        session()->flash('message', 'Fabric created successfully.');
        return redirect()->route('admin.fabric.view');
}
     #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.fabric.create-fabric');
    }
}
