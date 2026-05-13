<?php

namespace App\Livewire\Pages\Admin\Garment;

use App\Models\Category;
use App\Models\CategoryShop;
use App\Models\Garment;
use App\Models\Service;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
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
    public float $base_price = 0.0;
    public $image;
    public $category_id = null;
    public $garment;
    public $existingImage;

    public $service_id;

     #[Computed]
    public function categories()
    {
        return CategoryShop::whereHas('shop.users', fn($q) => $q->where('users.id', auth()->id()))->get();
    }
     #[Computed]
    public function services()
    {
        return Service::whereHas('shop.users', fn($q) => $q->where('users.id', auth()->guard('web')->id()))->get();
    }
    public function mount(int $id)
    {
        $this->garment = Garment::where('id','=', $id)
        ->whereHas('shop.users', fn ($query) => $query->where('users.id', auth()->guard('web')->id()))
            ->firstOrFail();

        $this->name = $this->garment->name;
        $this->description = $this->garment->description;
        $this->existingImage = $this->garment->image;
        $this->base_price = $this->garment->base_price;
        $this->category_id = $this->garment->category_id;
        $this->service_id = $this->garment->service_id;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|max:255|min:10|string',
            'category_id' => 'required|exists:category_shops,id',
            'base_price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Garment name is required',
            'name.string' => 'Garment name must be a string',
            'name.max' => 'Garment name must not exceed 255 characters',

            'description.string' => 'Garment description must be a string',
            'description.max' => 'Garment description must not exceed 255 characters',
            'description.min' => 'Garment description must be at least 10 characters',

            'category_id.required' => 'Category is required',
            'category_id.exists' => 'Selected category does not exist',

            'base_price.required' => 'Base price is required',
            'base_price.numeric' => 'Base price must be an integer',
            'base_price.min' => 'Base price must be at least 0',

            'image.image' => 'Image must be an image',
            'image.max' => 'Image must not exceed 2048 kilobytes',
        ];
    }

    public function save()
    {
        $this->validate();
        
        $this->name = Str::of($this->name)->trim()->title();
        $this->description = trim($this->description);
        $this->base_price = intval($this->base_price);
        
        $imagePath = $this->image ? $this->image->store('garments', 'public') : null;

        
        $this->garment->update([
            'name' => $this->name,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'service_id' => $this->service_id,
            'base_price' => $this->base_price,
            'image' => $imagePath ?: $this->existingImage,
        ]);
        
        session()->flash('success', 'Garment updated successfully!');
        return redirect()->route('admin.garment.view');
    }

    public function render()
    {
        return view('livewire.pages.admin.garment.edit-garment');
    }
}