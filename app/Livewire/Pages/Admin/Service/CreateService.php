<?php

namespace App\Livewire\Pages\Admin\Service;

use App\Models\Service;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CreateService extends Component
{
     #[Layout('components.layouts.admin')]

     public $name;
    public $description;
    // public $shop_id;
    public $slug;

    public function  rules()
    {
    return[
        'name'=> 'required|min:3|max:50|unique:services,name',
        'description' => 'required|min:10|max:255',
        'slug' => 'required|unique:services,slug',
    ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Service name is required',
            'name.min' => 'Service name must be at least 3 characters',
            'name.max' => 'Service name must not exceed 50 characters',
            'name.unique' => 'Service name must be unique',

            'description.required' => 'Description is required',
            'description.min' => 'Description must be at least 10 characters',
            'description.max' => 'Description must not exceed 255 characters',

           
            'slug.unique' => 'Slug must be unique',
            'slug.required' => 'Slug is required',
        ];
    }
    public function updatedCatName($value): void
    {
        $this->slug = Str::slug($value);
    }

        
        public function save(){
            $this->validate();
            $this->name = Str::of(trim(strip_tags($this->name)))->title();
            $this->description = Str::of(trim(strip_tags($this->description)))->title();
            $this->slug = Str::slug($this->name);

            Service::create([
                'name' => $this->name,
                'description' => $this->description,
                'slug' => $this->slug,
                // 'shop_id' => auth()->user()->shop->id, //Assuming the shop ID is associated with the authenticated user
            ]);

            $this->reset(['name', 'description', 'slug']);
            session()->flash('message', 'Service created successfully!');
            return redirect()->route('admin.service.view');
        }
    

    public function render()
    {
        return view('livewire.pages.admin.service.create-service');
    }
}
