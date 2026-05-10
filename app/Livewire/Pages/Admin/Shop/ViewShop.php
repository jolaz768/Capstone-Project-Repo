<?php

namespace App\Livewire\Pages\Admin\Shop;

use App\Models\Shop;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ViewShop extends Component
{
    
    #[Layout('components.layouts.admin')]

    #[Computed()]

    public function shops()
    {
        return Shop::query()
            ->select('id', 'shop_name', 'description', 'phone', 'shop_image', 'shop_logo', 'address', 'is_active', 'created_at')
            ->whereHas('users', fn ($query) => $query->where('users.id', auth()->id()))
            ->get();
    }

    // public function delete($id)
    // {
    //     $shop = Shop::where('id', $id)
    //         ->whereHas('users', fn ($query) => $query->where('users.id', auth()->id()))
    //         ->firstOrFail();

    //     $shop->delete();
    //     session()->flash('success', 'Shop deleted successfully!');
    //     return redirect()->route('admin.shop.view');
    // }
    
    public function render()
    {
        return view('livewire.pages.admin.shop.view-shop');
    }
}
