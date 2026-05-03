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
    public $garment;
    #[Computed()]
    public function garments()
    {
        return Garment::query()
        ->select('id', 'name', 'image','base_price','description','slug','category_id','created_at')
        ->with('category:id,cat_name',)
        ->get();
    }

    public function fabrics(){
        return Fabric::query()->select('id', 'name')->get();
    }

    public function colors(){
        return Color::query()->select('id', 'color_name')->get();
    }

    
    
     #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.garment.view-garment');
    }
}
