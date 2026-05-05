<?php

namespace App\Livewire\Pages\Public;

use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Shop;

class Index extends Component
{   
    #[Layout('components.layouts.app')]

   #[Computed()]

   public function shops()
   {
       return Shop::query()->select('id', 'shop_name', 'shop_image', 'shop_logo')
       ->where('is_active', 1)
       ->get(); // run Shop::query()
   }

   



    public function render()
    {
        return view('livewire.pages.public.index');
    }
}
