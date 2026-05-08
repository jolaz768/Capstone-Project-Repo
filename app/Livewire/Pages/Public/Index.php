<?php

namespace App\Livewire\Pages\Public;

use App\Models\Shop;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{   
    #[Layout('components.layouts.app')]

   #[Computed()]
   public $search = '';

    #[Computed]
    public function shops()
    {
        return Shop::query()
            ->select('id', 'shop_name', 'shop_image', 'shop_logo', 'address')
            ->where('is_active', 1)
            ->when($this->search, function ($query, $search) {
                $query->where('shop_name', 'like', '%' . $search . '%');
            })
            ->with(['services:id,name,shop_id', 
                    'garments:id,name,shop_id'
                    ])
            ->get();
    }

    public function render()
    {
        return view('livewire.pages.public.index');
    }
}
