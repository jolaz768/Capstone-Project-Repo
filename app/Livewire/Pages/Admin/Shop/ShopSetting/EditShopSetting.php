<?php

namespace App\Livewire\Pages\Admin\Shop\ShopSetting;

use Livewire\Attributes\Layout;
use Livewire\Component;

class EditShopSetting extends Component
{
    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.shop.shop-setting.edit-shop-setting');
    }
}
