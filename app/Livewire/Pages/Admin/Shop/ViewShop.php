<?php

namespace App\Livewire\Pages\Admin\Shop;

use Livewire\Attributes\Layout;
use Livewire\Component;

class ViewShop extends Component
{
    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.shop.view-shop');
    }
}
