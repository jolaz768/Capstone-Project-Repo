<?php

namespace App\Livewire\Pages\SuperAdmin;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Dashboard extends Component
{   
    #[Layout('components.layouts.superadmin') ]
    public function render()
    {
        return view('livewire.pages.super-admin.dashboard');
    }
}
