<?php

namespace App\Livewire\Pages\Admin\Fabric\Color;

use App\Models\Color;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

use function Laravel\Prompts\select;

class ViewColor extends Component
{
     #[Layout('components.layouts.admin')]
    public $color_name;
    public $color_code;
    public $color; 

   #[Computed()]
public function colors()
{
    return Color::query()
        ->select('id', 'color_name', 'color_code', 'created_at')
        ->get();
}


public function deleteColor($id)
{
    $color = Color::find($id);
    $color->delete();
    session()->flash('message', 'Color deleted successfully.');
}
   
    public function render()
    {
        return view('livewire.pages.admin.fabric.color.view-color');
    }
}
