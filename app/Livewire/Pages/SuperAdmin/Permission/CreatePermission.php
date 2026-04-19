<?php

namespace App\Livewire\Pages\SuperAdmin\Permission;

use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class CreatePermission extends Component
{   

    public $name;
    public $permission;
    public $guard_name = 'web';

    public function rules(){
        return [
            'name' => 'required|string|min:3|unique:permissions,name',
        ];
    }
    public function messages(){
        return [
            'name.required' => 'The permission name is required.',
            'name.unique' => 'The permission name must be unique/already taken.',
        ];
    }

    public function save()
    {

        $this->validate();

        $this->name = Str::of($this->name)->trim()->title()->lower();

        Permission::create([
            'name' => $this->name,
            
        ]);
        session()->flash('success', 'Permission created successfully.');
        return redirect()->route('super-admin.permission.view');
        $this->reset('name');
    }
    #[Layout('components.layouts.superadmin')]
    public function render()
    {
        return view('livewire.pages.super-admin.permission.create-permission');
    }
}
