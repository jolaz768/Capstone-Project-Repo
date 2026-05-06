<?php

namespace App\Livewire\Pages\Public\Shop;

use App\Models\Shop;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Review extends Component
{
    #[Layout('components.layouts.app')]
    
    public Shop $shop;

        public function mount($id)
    {
        $this->shop = Shop::query()
            ->where('id', $id)
            ->where('is_active', 1)
            ->with([

                'reviews:id,shop_id,user_id,rating,comment,created_at',
            ])
            ->firstOrFail();
    }
    public function render()
    {
        return view('livewire.pages.public.shop.review');
    }
}
