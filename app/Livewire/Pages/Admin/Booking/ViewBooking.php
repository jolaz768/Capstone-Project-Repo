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
        $this->refreshBookings();
    }

    public function refreshBookings(): void
    {
        $shopIds = Auth::user()->ownedShopIds();

        $this->bookings = Booking::query()
            ->with(['user', 'shop', 'service', 'bookingItems.garment'])
            ->whereIn('shop_id', $shopIds)
            ->orderByDesc('created_at')
            ->get();
    }

    public function updateStatus($bookingId, $newStatus)
    {
        $booking = Booking::findOrFail($bookingId);
        
        // Authorization: ensure the admin owns the shop for this booking
        $shopIds = Auth::user()->ownedShopIds();
        if (!in_array($booking->shop_id, $shopIds)) {
            session()->flash('error', 'You are not authorized to update this booking.');
            return;
        }
        
        $booking->update(['status' => $newStatus]);
        
        // Refresh the list
        $this->refreshBookings();
        
        session()->flash('message', "Booking #{$booking->id} status updated to " . ucfirst($newStatus) . ".");
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.booking.view-booking');
    }
}