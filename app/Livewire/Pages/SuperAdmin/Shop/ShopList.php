<?php

namespace App\Livewire\Pages\SuperAdmin\Shop;

use App\Models\Shop;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ShopList extends Component
{
    #[Layout('components.layouts.superadmin') ]

    #[Computed()]
    public $search = '';
    public function getShopsProperty()
    {
        return $this->shops();
    }

    public function shops()
    {
        return Shop::query()
        ->select('id', 'shop_name', 'description', 'phone', 'shop_image', 'shop_logo', 'address', 'is_active', 'created_at')
        ->when($this->search, function ($query, $search) {
                $query->where('shop_name', 'like', '%' . $search . '%');
            })
        ->get();
    }
    public function render()
    {
        return view('livewire.pages.super-admin.shop.shop-list');
    }
}
