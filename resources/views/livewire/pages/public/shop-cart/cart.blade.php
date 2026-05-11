<div>
    @if(session()->has('message'))
        <div class="alert alert-success">
            <span class="text-green-500 border-green-200 bg-green-100 px-4 py-3 rounded-lg inline-block text-center">
                {{ session('message') }}
            </span>
        </div>
    @endif

    <div class="bg-card border border-card-line rounded-xl overflow-hidden">
        <!-- Header -->
        <div class="px-6 py-4 border-b border-card-line">
            <h2 class="text-xl font-semibold text-foreground">Shopping Cart</h2>
            <p class="text-sm text-muted-foreground mt-1">
                {{ $this->totalCount }} {{ Str::plural('item', $this->totalCount) }} in your cart
            </p>
        </div>

        @if(count($cart) > 0)
            <!-- Desktop Table -->
            <div class="hidden md:block overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-muted/50 border-b border-card-line">
                        <tr>
                            <th class="px-6 py-3 text-sm font-medium text-foreground">Product</th>
                            <th class="px-6 py-3 text-sm font-medium text-foreground">Price</th>
                            <th class="px-6 py-3 text-sm font-medium text-foreground">Quantity</th>
                            <th class="px-6 py-3 text-sm font-medium text-foreground text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-card-line">
                        @foreach($cart as $id => $item)
                            <tr wire:key="cart-{{ $id }}">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-4">
                                        <div class="w-16 h-16 bg-gray-100 rounded-md overflow-hidden flex-shrink-0">
                                            <img src="{{ $item['image'] ? asset('storage/' . $item['image']) : 'https://placehold.co/400x400?text=No+Image' }}"
                                                alt="{{ $item['name'] }}" class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <p class="font-medium text-foreground">{{ $item['name'] }}</p>
                                            <p class="text-sm text-muted-foreground">₱{{ number_format($item['price'], 2) }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-foreground">₱{{ number_format($item['price'], 2) }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <button wire:click="updateQuantity({{ $id }}, {{ $item['quantity'] - 1 }})"
                                            class="w-7 h-7 rounded-full border border-layer-line text-foreground hover:bg-muted-hover flex items-center justify-center"
                                            @if($item['quantity'] == 1) title="Remove item" @endif>
                                            &minus;
                                        </button>
                                        <span class="w-8 text-center font-medium">{{ $item['quantity'] }}</span>
                                        <button wire:click="updateQuantity({{ $id }}, {{ $item['quantity'] + 1 }})"
                                            class="w-7 h-7 rounded-full border border-layer-line text-foreground hover:bg-muted-hover flex items-center justify-center">
                                            +
                                        </button>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-right font-medium text-foreground">
                                    ₱{{ number_format($item['price'] * $item['quantity'], 2) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Mobile Cards -->
            <div class="md:hidden divide-y divide-card-line">
                @foreach($cart as $id => $item)
                    <div class="p-4" wire:key="cart-mobile-{{ $id }}">
                        <div class="flex gap-4">
                            <div class="w-20 h-20 bg-gray-100 rounded-md overflow-hidden flex-shrink-0">
                                <img src="{{ $item['image'] ? asset('storage/' . $item['image']) : 'https://placehold.co/400x400?text=No+Image' }}"
                                    alt="{{ $item['name'] }}" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <p class="font-medium text-foreground">{{ $item['name'] }}</p>
                                <p class="text-sm text-muted-foreground">₱{{ number_format($item['price'], 2) }}</p>
                                <div class="flex items-center justify-between mt-3">
                                    <div class="flex items-center gap-2">
                                        <button wire:click="updateQuantity({{ $id }}, {{ $item['quantity'] - 1 }})"
                                            class="w-7 h-7 rounded-full border border-layer-line flex items-center justify-center">&minus;</button>
                                        <span class="w-8 text-center">{{ $item['quantity'] }}</span>
                                        <button wire:click="updateQuantity({{ $id }}, {{ $item['quantity'] + 1 }})"
                                            class="w-7 h-7 rounded-full border border-layer-line flex items-center justify-center">+</button>
                                    </div>
                                    <p class="font-medium">Total: ₱{{ number_format($item['price'] * $item['quantity'], 2) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Footer -->
            <div
                class="px-6 py-4 border-t border-card-line bg-muted/20 flex flex-col sm:flex-row justify-between items-center gap-4">
                <div class="text-lg font-semibold text-foreground">
                    Subtotal: <span class="text-2xl text-primary">₱{{ number_format($this->totalPrice, 2) }}</span>
                </div>
                <div class="flex gap-3">
                    <a href="{{ $this->shopId ? route('shop.view', ['id' => $this->shopId]) : url('/shops') }}"
                        class="px-4 py-2 text-sm font-medium rounded-lg border border-layer-line text-foreground hover:bg-muted-hover transition">
                        Continue Shopping
                    </a>
                    <a href="{{ route('booking.create', ['id' => $this->shopId]) }}" 
                        class="px-4 py-2 text-sm font-medium rounded-lg bg-primary text-primary-foreground hover:bg-primary-hover transition">
                        Book appointment
                    </a>
                </div>
            </div>
        @else
            <!-- Empty cart -->
            <div class="p-10 text-center">
                <p class="text-lg text-muted-foreground">Your cart is empty.</p>
                <a href="{{ route('index.page') }}" class="mt-3 inline-block text-primary font-medium hover:underline">
                    Browse Shops
                </a>
            </div>
        @endif
    </div>
</div>