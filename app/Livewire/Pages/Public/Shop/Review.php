<?php

namespace App\Livewire\Pages\Public\Shop;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Review extends Component
{
    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.pages.public.shop.review');
    }
}
