<?php

namespace App\Livewire\Pages\Public;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{   
    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.pages.public.index');
    }
}
