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

    public function rules()
    {
        return [
            'name' => 'required|min:3|max:50',
            'description' => 'required|min:10|max:255',
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
    public function updatedName($value): void
    {
        $this->slug = Str::slug($value);
    }

    public function save()
    {
        $this->validate();

        $name = Str::of(trim(strip_tags($this->name)))->title();
        $description = Str::of(trim(strip_tags($this->description)))->title();
        $slugBase = Str::slug($name);

        $shops = auth()->user()->shops()->get();
        if ($shops->isEmpty()) {
            throw new \RuntimeException('Authenticated user is not assigned to a shop.');
        }

        $createdCount = 0;
        foreach ($shops as $shop) {
            if (Service::where('shop_id', $shop->id)->where('name', $name)->exists()) {
                continue;
            }

            Service::create([
                'name' => $name,
                'description' => $description,
                'slug' => $slugBase . '-' . $shop->id,
                'shop_id' => $shop->id,
            ]);

            $createdCount++;
        }

        if ($createdCount === 0) {
            session()->flash('message', 'This service already exists in all your shops.');
        } else {
            session()->flash('message', "Service created successfully for {$createdCount} shop(s)!");
        }

        $this->reset(['name', 'description', 'slug']);
        return redirect()->route('admin.service.view');
    }
    

    public function render()
    {
        return view('livewire.pages.admin.service.create-service');
    }
}
