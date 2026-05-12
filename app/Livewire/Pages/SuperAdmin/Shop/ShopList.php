<?php

namespace App\Livewire\Pages\SuperAdmin\Shop;

use App\Models\Shop;
use App\Models\UserShop;
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
        return UserShop::query()
            ->select('id', 'shop_id', 'user_id')

            ->with([
                'shop:id,shop_name,description,shop_image,shop_logo,phone,address,is_active,created_at',
                'user:id,name'
            ])
            ->when($this->search, function ($query) {
                $query->whereHas('shop', function ($q) {
                    $q->where('shop_name', 'like', '%' . $this->search . '%');
                });
            })
            ->get();
    }

   public function delete(int $id): void
{
    $shop = Shop::findOrFail($id);
    $shop->delete();
}

    public function render()
    {
        return view('livewire.pages.super-admin.shop.shop-list');
    }
}
