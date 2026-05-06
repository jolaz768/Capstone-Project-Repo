<?php

namespace App\Livewire\Pages\Admin\Booking;

use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ViewBooking extends Component
{
    public $bookings;

    public function mount(): void
    {
        $shopIds = Auth::user()->ownedShopIds();

        $this->bookings = Booking::query()
            ->with(['user', 'shop', 'service', 'bookingItems.garment'])
            ->whereIn('shop_id', $shopIds)
            ->orderByDesc('created_at')
            ->get();
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.booking.view-booking');
    }
}
