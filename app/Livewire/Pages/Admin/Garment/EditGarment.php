<?php

namespace App\Livewire\Pages\Admin\Garment;

use App\Models\Garment;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditGarment extends Component
{
    use WithFileUploads;
    
     #[Layout('components.layouts.admin')]

    public string $name = '';
    public string $slug = '';
    public string $description = '';
    public int $category_id = 0;
    public int $measurement_field_id = 0;
    public int $base_price = 0;
    public  $image ;

    public $garment;
    

    public function mount($id)
    {
        $this->garment = Garment::findOrFail($id);
        $this->name = $this->garment->name;
        $this->slug = $this->garment->slug;
        $this->description = $this->garment->description;
        $this->category_id = $this->garment->category_id;
        $this->measurement_field_id = $this->garment->measurement_field_id;
        $this->base_price = $this->garment->base_price;
        
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:garments,slug',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'measurement_field_id' => 'nullable|exists:measurement_fields,id',
            'base_price' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Garment name is required',
            'name.string' => 'Garment name must be a string',
            'name.max' => 'Garment name must not exceed 255 characters',

            'slug.required' => 'Garment slug is required',
            'slug.string' => 'Garment slug must be a string',
            'slug.max' => 'Garment slug must not exceed 255 characters',
            'slug.unique' => 'Garment slug must be unique',

            'description.string' => 'Garment description must be a string',

            'category_id.required' => 'Category is required',
            'category_id.exists' => 'Selected category does not exist',

            'measurement_field_id.exists' => 'Selected measurement field does not exist',

            'base_price.required' => 'Base price is required',
            'base_price.integer' => 'Base price must be an integer',
            'base_price.min' => 'Base price must be at least 0',

            'image.image' => 'Image must be an image',
            'image.max' => 'Image must not exceed 2048 kilobytes',
        ];
    }
    public function save()
    {
        $this->validate();
    $this->name = Str::of($this->name)->trim()->title();
    $this->slug = Str::slug($this->name);
    $this->description = trim($this->description);
    $this->base_price = intval($this->base_price);
     $imagePath = $this->image ? $this->image->store('garments', 'public') : null; 

        $this->Garment::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'measurement_field_id' => $this->measurement_field_id,
            'base_price' => $this->base_price,
            'image' => $imagePath,
        ]);

        session()->flash('success', 'Garment created successfully!');
        return redirect()->route('admin.garment.view');
    }
    public function render()
    {
        return view('livewire.pages.admin.garment.edit-garment');
    }
}
