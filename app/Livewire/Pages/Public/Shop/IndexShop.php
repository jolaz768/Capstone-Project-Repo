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

    public function mount(int $id)
    {
        
        $this->shop = Shop::query()
            ->where('id', '=', $id)
            ->where('is_active', 1)
            ->with([
                'services:id,shop_id,name,description,image,created_at',
                'garments:id,shop_id,name,description,image,base_price,category_id,service_id',

            ])
            
            ->firstOrFail();
    }
      
    // ... other properties

    public function addToCart($garmentId, $name, $price , $image = null, $serviceId = null)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$garmentId])) {
            $cart[$garmentId]['quantity']++;
        } else {
            $cart[$garmentId] = [
                'id'         => $garmentId,
                'name'       => $name,
                'price'      => $price,
                'image'      => $image,
                'quantity'   => 1,
                'shop_id'    => $this->shop->id,
                'service_id' => $serviceId,
            ];
        }

        session()->put('cart', $cart);

        // Flash a success message that the Cart page can display
        session()->flash('message', "$name added to cart!");
    }
    public function render()
    {
        return view('livewire.pages.public.shop.index-shop');
    }
}
