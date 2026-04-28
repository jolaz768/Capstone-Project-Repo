<?php

namespace App\Livewire\Pages\Admin\Shop\ShopCategory;

use App\Models\CategoryShop;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ViewCategory extends Component
{
    #[Layout('components.layouts.admin')]
    public $cat_name;
    public $cat_slug;
    public $cat_desc;

    
    #[Computed()]

    public function categories()
    {
        return CategoryShop::query()
        ->select('id', 'cat_name', 'cat_slug', 'cat_desc', 'created_at')
        ->get();
    }


    public function delete($id)
    {
        $category = CategoryShop::findOrFail($id);
        $category->delete();

        session()->flash('message', 'Category deleted successfully.');
    }
    
    public function render()
    {
        return view('livewire.pages.admin.shop.shop-category.view-category');
    }
}
