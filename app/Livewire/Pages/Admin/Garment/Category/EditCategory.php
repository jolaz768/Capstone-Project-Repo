<?php

namespace App\Livewire\Pages\Admin\Garment\Category;

use Livewire\Attributes\Layout;
use Livewire\Component;

class EditCategory extends Component
{
     #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.garment.category.edit-category');
    }
}
