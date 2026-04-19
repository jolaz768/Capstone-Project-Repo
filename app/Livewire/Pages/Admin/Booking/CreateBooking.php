<?php

namespace App\Livewire\Pages\Admin\Booking;

use Livewire\Attributes\Layout;
use Livewire\Component;

class CreateBooking extends Component
{
     #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.booking.create-booking');
    }
}
