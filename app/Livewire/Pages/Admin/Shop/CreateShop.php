<?php

namespace App\Livewire\Pages\Admin\Shop;

use Livewire\Attributes\Layout;
use Livewire\Component;

class CreateShop extends Component
{
    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.shop.create-shop');
    }
}
