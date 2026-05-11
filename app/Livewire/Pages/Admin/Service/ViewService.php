<?php

namespace App\Livewire\Pages\Admin\Service;

use App\Models\Service;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ViewService extends Component
{
    #[Layout('components.layouts.admin')]

    public $name;
    public $description;
    public $slug;


    #[Computed()]

    public function services()
    {
        return Service::query()
            ->select(['id', 'name', 'description', 'image', 'created_at'])
            ->whereHas('shop.users', fn($query) => $query->where('users.id', auth()->guard('web')->id()))
            ->get();
    }


public function delete($id)
{
    $service = Service::query()
        ->where('id', '=', $id)  
        ->whereHas('shop.users', function($query) {
            $query->where('users.id', '=', auth()->guard('web')->id());
        })
        ->firstOrFail();

    $service->delete($id);
    session()->flash('message', 'Service deleted successfully!');
    return redirect()->route('admin.service.view');
}


    public function render()
    {
        return view('livewire.pages.admin.service.view-service');
    }
}
