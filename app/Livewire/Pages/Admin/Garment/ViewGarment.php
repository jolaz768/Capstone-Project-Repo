<?php

namespace App\Livewire\Pages\Admin\Garment;

use App\Models\Color;
use App\Models\Fabric;
use App\Models\Garment;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ViewGarment extends Component
{
   
   #[Computed()]
public function garments()
{
    return Garment::query()
        ->select('id', 'name', 'image', 'base_price', 'description','category_id', 'created_at', 'shop_id')
        ->with(['category', 'shop'])  // eager load both
       ->whereHas('shop.users', fn ($query) => $query->where('users.id', auth()->guard('web')->id()))
        ->get();
}


     #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.garment.view-garment');
    }
}
