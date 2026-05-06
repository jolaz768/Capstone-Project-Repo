<?php

namespace App\Livewire\Pages\Public\Shop;

use App\Models\Shop;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

class IndexShop extends Component
{   
    #[Layout('components.layouts.app')]

      public Shop $shop;

    public function mount($id)
    {
        $this->shop = Shop::query()
            ->where('id', $id)
            ->where('is_active', 1)
            ->with([
                'services:id,shop_id,name,description,created_at',
                'garments:id,shop_id,name,description,image,base_price',

                
            ])
            ->firstOrFail();
    }
    
    public function render()
    {
        return view('livewire.pages.public.shop.index-shop');
    }
}
