<?php

namespace App\Livewire\Pages\SuperAdmin\Permission;

use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class ViewPermission extends Component
{
    // Remove the $permission property entirely
    public $permissions =[];

  
    public function mount()
{
    $this->permissions = Permission::select('id', 'name', 'created_at')->get();
}

    #[Layout('components.layouts.superadmin')]
    public function render()
    {
        return view('livewire.pages.super-admin.permission.view-permission');
    }
}