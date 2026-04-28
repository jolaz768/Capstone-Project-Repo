<?php

namespace App\Livewire\Pages\Admin\Garment\Category;

use App\Models\Category;
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
        return Category::query()
        ->select('id', 'cat_name', 'cat_slug', 'cat_desc', 'created_at')
        ->get();
    }


    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        session()->flash('message', 'Category deleted successfully.');
    }
    public function render()
    {
        return view('livewire.pages.admin.garment.category.view-category');
    }
}
