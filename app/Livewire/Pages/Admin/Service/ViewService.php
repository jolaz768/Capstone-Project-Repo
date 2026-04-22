<?php

namespace App\Livewire\Pages\Admin\Service;

use Livewire\Attributes\Layout;
use Livewire\Component;

class ViewService extends Component
{
     #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.service.view-service');
    }
}
