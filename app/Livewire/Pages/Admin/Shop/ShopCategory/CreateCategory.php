<?php

namespace App\Livewire\Pages\Admin\Shop\ShopCategory;

use App\Models\CategoryShop;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CreateCategory extends Component
{
    #[Layout('components.layouts.admin')]

    public $cat_name='';
    public $cat_slug='';
    public $cat_desc='';

       public function updatedCatName($value): void
    {
        $this->cat_slug = Str::slug($value);
    }

    public function rules()
    {
        return [
            'cat_name' => 'unique:category_shops,cat_name|required|min:3|max:50',
            'cat_slug' => 'required|unique:category_shops,cat_slug',
            'cat_desc' => 'required|min:10|max:255',
        ];
    }

    public function messages()
    {
        return [
            'cat_name.required' => 'Category name is required.',
            'cat_name.unique' => 'Category name must be unique.',
            'cat_name.min' => 'Category name must be at least 3 characters.',
            'cat_name.max' => 'Category name must not exceed 50 characters.',

            'cat_slug.required' => 'Category slug is required.',
            'cat_slug.unique' => 'Category slug must be unique.',

            'cat_desc.required' => 'Category description is required.',
            'cat_desc.min' => 'Category description must be at least 10 characters.',
            'cat_desc.max' => 'Category description must not exceed 255 characters.',
        ];
    }

    public  function save()
    {
        $this->validate();
        $this->cat_name = ucwords(trim(strip_tags($this->cat_name)));
        $this->cat_slug = Str::slug($this->cat_name);
        $this->cat_desc = ucfirst(trim(strip_tags($this->cat_desc)));

        CategoryShop::create([
            // 'shop_id' => auth()->user()->shop->id,
            'cat_name' => $this->cat_name,
            'cat_slug' => $this->cat_slug,
            'cat_desc' => $this->cat_desc,
        ]);

        session()->flash('message', 'Category created successfully.');
        $this->reset();
    }
    public function render()
    {
        return view('livewire.pages.admin.shop.shop-category.create-category');
    }
}
