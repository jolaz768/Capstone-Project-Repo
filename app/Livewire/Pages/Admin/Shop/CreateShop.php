<?php

namespace App\Livewire\Pages\Admin\Shop;


use App\Models\Shop;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateShop extends Component
{
    use WithFileUploads;
    public string $shop_name = '';
    public string $description = '';
    public string $slug;
    public $phone;
    public $shop_image;
    public $shop_logo;
    public string $address ;
    public  $is_active;
    

    public function rules()
    {
        return [
            'shop_name' => 'required|string|min:3|max:50',
            'description' => 'required|min:10|max:255',
            'slug'=> 'required|unique:shops,slug|alpha_dash',
            'phone' => ['required', 'regex:/^(09|\+639)\d{3}[-\s]?\d{3}[-\s]?\d{3}$/', 'max:15'],
            'shop_image' => 'required|image|max:2048',
            'shop_logo' => 'required|image|max:2048',
            'address' => 'required|min:10|max:255',
            'is_active' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'shop_name.required' => 'Shop name is required',
            'shop_name.string' => 'Shop name must be a string',
            'shop_name.min' => 'Shop name must be at least 3 characters',
            'shop_name.max' => 'Shop name must not exceed 50 characters',

            'description.required' => 'Description is required',
            'description.string' => 'Description must be a string',
            'description.min' => 'Description must be at least 10 characters',
            'description.max' => 'Description must not exceed 255 characters',

            'slug.required' => 'Slug is required',
            'slug.unique' => 'Slug must be unique',

            'phone' => 'Phone number must be a valid Philippine number',
            'phone.max' => 'Phone number must not exceed 15 characters',
            'phone.regex' => 'Phone number must be a valid Philippine number',
            'phone.required' => 'Phone number is required',
            'phone.string' => 'Phone number must be a string',
            'phone.max' => 'Phone number must not exceed 15 characters',
            

            'shop_image.required' => 'Shop image is required',
            'shop_image.image' => 'Shop image must be an image',
            'shop_image.max' => 'Shop image must not exceed 2048 kilobytes',

            'shop_logo.required' => 'Shop logo is required',
            'shop_logo.image' => 'Shop logo must be an image',
            'shop_logo.max' => 'Shop logo must not exceed 2048 kilobytes',

            'address.required' => 'Address is required',
            'address.string' => 'Address must be a string',
            'address.min' => 'Address must be at least 10 characters',
            'address.max' => 'Address must not exceed 255 characters',

            'is_active.required' => 'Is Status is required',
            'is_active.boolean' => 'Is Status must be a boolean',
        ];
    }

    public function save()
{
    $this->validate();

    $this->shop_name   = Str::of($this->shop_name)->trim()->title();
    $this->slug        = Str::slug($this->shop_name);
    $this->description = Str::of($this->description)->trim()->title();
    $this->phone       = intval($this->phone);
    $this->address     = trim($this->address ?? '');
    $this->is_active   = $this->is_active ? 1 : 0;  // boolean to 0/1 if needed

    $imagePath = $this->shop_image ? $this->shop_image->store('shops', 'public') : null;
    $logoPath = $this->shop_logo ? $this->shop_logo->store('shops', 'public') : null;

    $shop = Shop::create([
        'user_id'     => auth()->id(),
        'shop_name'   => $this->shop_name,
        'slug'        => $this->slug,
        'description' => $this->description,
        'phone'       => $this->phone,
        'shop_image'  => $imagePath,
        'shop_logo'   => $logoPath,
        'address'     => $this->address,
        'is_active'   => $this->is_active,
    ]);

    $shop->users()->attach(auth()->id());

    session()->flash('success', 'Shop created successfully!');
    return redirect()->route('admin.shop.view');
}
       

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.shop.create-shop');
    }
}
