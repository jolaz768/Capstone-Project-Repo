<div>
    @if(session()->has('message'))
        <div class="alert alert-success">
            <span
                class="text-green-500 border-green-200 bg-green-100 px-4 py-3 rounded-lg inline-block text-center">{{ session()->get('message') }}</span>
        </div>
    @endif
        
    <div class="bg-card border border-card-line rounded-xl overflow-hidden">
    <!-- Header -->
    <div class="px-6 py-4 border-b border-card-line">
        <h2 class="text-xl font-semibold text-foreground">Shopping Cart</h2>
        <p class="text-sm text-muted-foreground mt-1">3 items in your cart</p>
    </div>

    <!-- Cart Table (hidden on mobile, shown on md+) -->
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
                <!-- Product 1 -->
                <tr>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 bg-gray-100 rounded-md overflow-hidden flex-shrink-0">
                                <img src="https://placehold.co/400x400?text=250x250" alt="Product" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <p class="font-medium text-foreground">Product Name</p>
                                <p class="text-sm text-muted-foreground">Brand & Name</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-foreground">$49.00</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <button class="w-7 h-7 rounded-full border border-layer-line text-foreground hover:bg-muted-hover">-</button>
                            <span class="w-8 text-center font-medium">1</span>
                            <button class="w-7 h-7 rounded-full border border-layer-line text-foreground hover:bg-muted-hover">+</button>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-right font-medium text-foreground">$49.00</td>
                </tr>
                <!-- Product 2 -->
                <tr>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 bg-gray-100 rounded-md overflow-hidden flex-shrink-0">
                                <img src="https://placehold.co/400x400?text=250x250" alt="Product" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <p class="font-medium text-foreground">Another Product</p>
                                <p class="text-sm text-muted-foreground">Brand & Name</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-foreground">$29.00</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <button class="w-7 h-7 rounded-full border border-layer-line text-foreground hover:bg-muted-hover">-</button>
                            <span class="w-8 text-center font-medium">2</span>
                            <button class="w-7 h-7 rounded-full border border-layer-line text-foreground hover:bg-muted-hover">+</button>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-right font-medium text-foreground">$58.00</td>
                </tr>
                <!-- Product 3 -->
                <tr>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 bg-gray-100 rounded-md overflow-hidden flex-shrink-0">
                                <img src="https://placehold.co/400x400?text=250x250" alt="Product" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <p class="font-medium text-foreground">Third Item</p>
                                <p class="text-sm text-muted-foreground">Brand & Name</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-foreground">$12.00</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <button class="w-7 h-7 rounded-full border border-layer-line text-foreground hover:bg-muted-hover">-</button>
                            <span class="w-8 text-center font-medium">1</span>
                            <button class="w-7 h-7 rounded-full border border-layer-line text-foreground hover:bg-muted-hover">+</button>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-right font-medium text-foreground">$12.00</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Mobile cards (shown on small screens) -->
    <div class="md:hidden divide-y divide-card-line">
        <div class="p-4">
            <div class="flex gap-4">
                <div class="w-20 h-20 bg-gray-100 rounded-md overflow-hidden flex-shrink-0">
                    <img src="https://placehold.co/400x400?text=250x250" alt="Product" class="w-full h-full object-cover">
                </div>
                <div class="flex-1">
                    <p class="font-medium text-foreground">Product Name</p>
                    <p class="text-sm text-muted-foreground">Brand & Name</p>
                    <p class="mt-1 text-foreground">$49.00</p>
                    <div class="flex items-center justify-between mt-3">
                        <div class="flex items-center gap-2">
                            <button class="w-7 h-7 rounded-full border border-layer-line">-</button>
                            <span class="w-8 text-center">1</span>
                            <button class="w-7 h-7 rounded-full border border-layer-line">+</button>
                        </div>
                        <p class="font-medium">Total: $49.00</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- repeat similar for other products (omitted for brevity) -->
        <div class="p-4">
            <div class="flex gap-4">
                <div class="w-20 h-20 bg-gray-100 rounded-md overflow-hidden flex-shrink-0">
                    <img src="https://placehold.co/400x400?text=250x250" alt="Product" class="w-full h-full object-cover">
                </div>
                <div class="flex-1">
                    <p class="font-medium text-foreground">Another Product</p>
                    <p class="text-sm text-muted-foreground">Brand & Name</p>
                    <p class="mt-1 text-foreground">$29.00</p>
                    <div class="flex items-center justify-between mt-3">
                        <div class="flex items-center gap-2">
                            <button class="w-7 h-7 rounded-full border border-layer-line">-</button>
                            <span class="w-8 text-center">2</span>
                            <button class="w-7 h-7 rounded-full border border-layer-line">+</button>
                        </div>
                        <p class="font-medium">Total: $58.00</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-4">
            <div class="flex gap-4">
                <div class="w-20 h-20 bg-gray-100 rounded-md overflow-hidden flex-shrink-0">
                    <img src="https://placehold.co/400x400?text=250x250" alt="Product" class="w-full h-full object-cover">
                </div>
                <div class="flex-1">
                    <p class="font-medium text-foreground">Third Item</p>
                    <p class="text-sm text-muted-foreground">Brand & Name</p>
                    <p class="mt-1 text-foreground">$12.00</p>
                    <div class="flex items-center justify-between mt-3">
                        <div class="flex items-center gap-2">
                            <button class="w-7 h-7 rounded-full border border-layer-line">-</button>
                            <span class="w-8 text-center">1</span>
                            <button class="w-7 h-7 rounded-full border border-layer-line">+</button>
                        </div>
                        <p class="font-medium">Total: $12.00</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer with subtotal and buttons -->
    <div class="px-6 py-4 border-t border-card-line bg-muted/20 flex flex-col sm:flex-row justify-between items-center gap-4">
        <div class="text-lg font-semibold text-foreground">
            Subtotal: <span class="text-2xl text-primary">$119.00</span>
        </div>
        <div class="flex gap-3">
            <a href="#" class="px-4 py-2 text-sm font-medium rounded-lg border border-layer-line text-foreground hover:bg-muted-hover transition">
                Continue Shopping
            </a>
            <a href="#" class="px-4 py-2 text-sm font-medium rounded-lg bg-primary text-primary-foreground hover:bg-primary-hover transition">
                Checkout
            </a>
        </div>
    </div>
</div>
</div>
