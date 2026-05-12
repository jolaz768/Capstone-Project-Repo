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
    <div class="py-2">
        <div class="flex justify-between">
            <span class="font-semibold">{{ $item->garment->name ?? 'Garment' }}</span>
            <span class="text-sm text-gray-500">Qty: {{ $item->quantity }}</span>
        </div>

        @php $template = $item->garment->measurementTemplate; @endphp
        @if($template)
            <div class="mt-1 text-xs text-foreground">
                <span class="font-medium">Measurements:</span>
                @if($template->measurementFields->isNotEmpty())
                    <ul class="ml-4">
                        @foreach($template->measurementFields as $field)
                            <li>
                                {{ $field->field_name }} ({{ $field->unit }}):
                                {{ $field->measurementValue->value ?? '—' }}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <span class="italic">No fields defined</span>
                @endif
            </div>
        @endif
    </div>
@endforeach
                            </td>
                            <td class="px-4 py-4">{{ $booking->booking_date }}</td>
                            <td class="px-4 py-4">₱{{ number_format($booking->total_price, 2) }}</td>
                            <td class="px-4 py-4">
                                <select wire:change="updateStatus({{ $booking->id }}, $event.target.value)"
                                    class="rounded-lg border border-card-line bg-card px-3 py-1 text-sm capitalize focus:border-primary-focus focus:ring-primary-focus">
                                    <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="approved" {{ $booking->status == 'approved' ? 'selected' : '' }}>Approved
                                    </option>
                                    <option value="processing" {{ $booking->status == 'processing' ? 'selected' : '' }}>Processing
                                    </option>
                                    <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>Completed
                                    </option>
                                    <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled
                                    </option>
                                </select>
                                <div wire:loading wire:target="updateStatus({{ $booking->id }}, *)"
                                    class="inline-block ml-2 h-4 w-4 animate-spin rounded-full border-2 border-primary border-t-transparent">
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>