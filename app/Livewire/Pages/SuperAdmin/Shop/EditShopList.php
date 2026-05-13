<?php

namespace App\Livewire\Pages\SuperAdmin\Shop;

use App\Models\Shop;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditShopList extends Component
{
     use WithFileUploads;

    #[Layout('components.layouts.superadmin') ]

    public string $shop_name = '';
    public string $description = '';
    public $phone;
    public $shop_image;          // temporary uploaded file
    public $shop_logo;           // temporary uploaded file
    public string $address = '';
    public $is_active;
    public $existing_shop_image; // existing path from DB
    public $existing_shop_logo;  // existing path from DB
    public $shop;

    public function mount($id)
    {
        $this->shop = Shop::findOrFail($id);

        $this->shop_name = $this->shop->shop_name;
        $this->description = $this->shop->description;
        $this->phone = $this->shop->phone;   // keep as string
        $this->existing_shop_image = $this->shop->shop_image;
        $this->existing_shop_logo = $this->shop->shop_logo;
        $this->address = $this->shop->address;
        $this->is_active = (bool) $this->shop->is_active;
    }

    public function rules()
    {
        return [
            'shop_name'  => 'required|string|min:3|max:50',
            'description'=> 'required|string|min:10|max:255',
            'phone'      => ['required', 'regex:/^(09|\+639)\d{3}[-\s]?\d{3}[-\s]?\d{3}$/', 'max:15'],
            'shop_image' => 'nullable|image|max:2048',
            'shop_logo'  => 'nullable|image|max:2048',
            'address'    => 'required|string|min:10|max:255',
            'is_active'  => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'shop_name.required' => 'Shop name is required',
            'shop_name.min' => 'Shop name must be at least 3 characters',
            'shop_name.max' => 'Shop name must not exceed 50 characters',
            'description.required' => 'Description is required',
            'description.min' => 'Description must be at least 10 characters',
            'description.max' => 'Description must not exceed 255 characters',
            'phone.required' => 'Phone number is required',
            'phone.regex' => 'Phone number must be a valid Philippine number (e.g., 09123456789)',
            'phone.max' => 'Phone number must not exceed 15 characters',
            'shop_image.image' => 'Shop image must be an image',
            'shop_image.max' => 'Shop image must not exceed 2MB',
            'shop_logo.image' => 'Shop logo must be an image',
            'shop_logo.max' => 'Shop logo must not exceed 2MB',
            'address.required' => 'Address is required',
            'address.min' => 'Address must be at least 10 characters',
            'address.max' => 'Address must not exceed 255 characters',
            'is_active.required' => 'Please specify if the shop is active',
        ];
    }

    public function save()
    {
        $this->validate();

        $this->shop_name   = Str::of($this->shop_name)->trim()->title();
        $this->description = Str::of($this->description)->trim();
        $this->phone       = trim($this->phone);            // keep as string
        $this->address     = trim($this->address);
        $this->is_active   = (bool) $this->is_active;

        // Handle shop image
        $imagePath = $this->existing_shop_image;
        if ($this->shop_image) {
            // Delete old image if exists
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $this->shop_image->store('shops', 'public');
        }

        // Handle shop logo
        $logoPath = $this->existing_shop_logo;
        if ($this->shop_logo) {
            if ($logoPath && Storage::disk('public')->exists($logoPath)) {
                Storage::disk('public')->delete($logoPath);
            }
            $logoPath = $this->shop_logo->store('shops', 'public');
        }

        $this->shop->update([
            'shop_name'   => $this->shop_name,
            'description' => $this->description,
            'phone'       => $this->phone,
            'shop_image'  => $imagePath,
            'shop_logo'   => $logoPath,
            'address'     => $this->address,
            'is_active'   => $this->is_active,
        ]);

        session()->flash('success', 'Shop updated successfully!');
        return redirect()->route('super-admin.shop.list');
    }
    public function render()
    {
        return view('livewire.pages.super-admin.shop.edit-shop-list');
    }
}
