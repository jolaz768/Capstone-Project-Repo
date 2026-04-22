<?php

namespace App\Livewire\Pages\Admin\Service;

use Livewire\Attributes\Layout;
use Livewire\Component;

class CreateService extends Component
{
     #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.service.create-service');
    }
}
