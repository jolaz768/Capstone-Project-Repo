<div class="space-y-6 p-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-foreground">Customer Bookings</h1>
            <p class="text-sm text-muted-foreground">Bookings from your shop(s).</p>
        </div>
    </div>

    @if ($bookings->isEmpty())
        <div class="rounded-lg border border-card-line bg-card p-6 text-center text-sm text-muted-foreground">
            No customer bookings have arrived yet.
        </div>
    @else
        <div class="overflow-x-auto rounded-xl border border-card-line bg-card">
            <table class="min-w-full divide-y divide-card-line text-sm text-left">
                <thead class="bg-card-line">
                    <tr>
                        <th class="px-4 py-3 font-semibold text-foreground">ID</th>
                        <th class="px-4 py-3 font-semibold text-foreground">Customer</th>
                        <th class="px-4 py-3 font-semibold text-foreground">Shop</th>
                        <th class="px-4 py-3 font-semibold text-foreground">Service</th>
                        <th class="px-4 py-3 font-semibold text-foreground">Garments</th>
                        <th class="px-4 py-3 font-semibold text-foreground">Date</th>
                        <th class="px-4 py-3 font-semibold text-foreground">Total</th>
                        <th class="px-4 py-3 font-semibold text-foreground">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-card-line bg-card">
                    @foreach ($bookings as $booking)
                        <tr>
                            <td class="px-4 py-4">{{ $booking->id }}</td>
                            <td class="px-4 py-4">
                                <div class="font-medium text-foreground">{{ $booking->user->name ?? 'Guest' }}</div>
                                <div class="text-muted-foreground text-xs">{{ $booking->user->email ?? 'No email' }}</div>
                            </td>
                            <td class="px-4 py-4">{{ $booking->shop->shop_name }}</td>
                            <td class="px-4 py-4">{{ $booking->service->name ?? 'N/A' }}</td>
                            <td class="px-4 py-4 space-y-2">
                                @foreach ($booking->bookingItems as $item)
                                    <div>
                                        <span class="font-medium">{{ $item->garment->name ?? 'Item' }}</span>
                                        <span class="text-muted-foreground text-xs">× {{ $item->quantity }}</span>
                                    </div>
                                @endforeach
                            </td>
                            <td class="px-4 py-4">{{ $booking->booking_date }}</td>
                            <td class="px-4 py-4">₱{{ number_format($booking->total_price, 2) }}</td>
                            <td class="px-4 py-4 capitalize">{{ $booking->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
