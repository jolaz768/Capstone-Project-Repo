<?php

namespace App\Livewire\Pages\Public\Booking\RentalBooking;

use Livewire\Attributes\Layout;
use Livewire\Component;

class RentalBooking extends Component
{
    #[Layout('components.layouts.app')]

    
    
    
    public function render()
    {
        return view('livewire.pages.public.booking.rental-booking.rental-booking');
    }
}
