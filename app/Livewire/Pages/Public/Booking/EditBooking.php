<?php

namespace App\Livewire\Pages\Public\Booking;

use Livewire\Attributes\Layout;
use Livewire\Component;

class EditBooking extends Component
{

  #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.pages.public.booking.edit-booking');
    }
}
