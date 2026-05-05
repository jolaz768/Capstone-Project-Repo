<?php

namespace App\Livewire\Pages\Public\Shop;

use App\Models\Shop;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ShowShop extends Component
{
    public Shop $shop;
    public $services =[];

    #[Layout('components.layouts.app')]
    public function mount(Shop $shop)
    {
        $this->shop = $shop;
    }

    #[Computed]
    public function services()
    {
        return $this->shop->services()->get();
    }

    #[Computed]
    public function garments()
    {
        return $this->shop->garments()->get();
    }

    public function render()
    {
        return view('livewire.pages.public.shop.show-shop');
    }
}
