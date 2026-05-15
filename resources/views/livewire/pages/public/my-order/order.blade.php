<div class="min-h-screen dark:bg-[#020817] bg-white text-white pt-10">
    <main class="max-w-7xl mx-auto px-6 py-10">
        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-4xl font-bold mb-2 text-foreground">My Orders</h2>
            <p class="text-foreground">Track and monitor your tailoring orders and payments.</p>
        </div>

        <!-- Analytics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-4 mb-8">
            <div class="bg-slate-900/80 border border-white/10 rounded-2xl p-5">
                <p class="text-white text-sm">All Orders</p>
                <h3 class="text-3xl font-bold mt-2">{{ $this->stats['all'] }}</h3>
            </div>
            <div class="bg-slate-900/80 border border-yellow-500/20 rounded-2xl p-5">
                <p class="text-yellow-400 text-sm">Pending</p>
                <h3 class="text-3xl font-bold mt-2">{{ $this->stats['pending'] }}</h3>
            </div>
            <div class="bg-slate-900/80 border border-green-500/20 rounded-2xl p-5">
                <p class="text-green-400 text-sm">Approved</p>
                <h3 class="text-3xl font-bold mt-2">{{ $this->stats['approved'] }}</h3>
            </div>
            <div class="bg-slate-900/80 border border-blue-500/20 rounded-2xl p-5">
                <p class="text-blue-400 text-sm">Processing</p>
                <h3 class="text-3xl font-bold mt-2">{{ $this->stats['processing'] }}</h3>
            </div>
            <div class="bg-slate-900/80 border border-purple-500/20 rounded-2xl p-5">
                <p class="text-purple-400 text-sm">Completed</p>
                <h3 class="text-3xl font-bold mt-2">{{ $this->stats['completed'] }}</h3>
            </div>
            <div class="bg-slate-900/80 border border-red-500/20 rounded-2xl p-5">
                <p class="text-red-400 text-sm">Cancelled</p>
                <h3 class="text-3xl font-bold mt-2">{{ $this->stats['cancelled'] }}</h3>
            </div>
        </div>

        <!-- Filter + Search Bar -->
        <div class="bg-slate-900/70 border border-white/10 rounded-3xl overflow-hidden">
            <div class="flex flex-wrap items-center justify-between gap-4 px-6 py-5 border-b border-white/10">
                <div class="flex flex-wrap gap-6 text-sm font-medium text-fore">
                    <button wire:click="setFilter('all')" class="{{ $filterStatus == 'all' ? 'text-yellow-400 border-b-2 border-yellow-400' : 'text-foreground hover:text-yellow-400' }} pb-1">All Orders</button>
                    <button wire:click="setFilter('pending')" class="{{ $filterStatus == 'pending' ? 'text-yellow-400 border-b-2 border-yellow-400' : 'text-foreground hover:text-yellow-400' }}">Pending</button>
                    <button wire:click="setFilter('approved')" class="{{ $filterStatus == 'approved' ? 'text-yellow-400 border-b-2 border-yellow-400' : 'text-foreground hover:text-yellow-400' }}">Approved</button>
                    <button wire:click="setFilter('processing')" class="{{ $filterStatus == 'processing' ? 'text-yellow-400 border-b-2 border-yellow-400' : 'text-foreground hover:text-yellow-400' }}">Processing</button>
                    <button wire:click="setFilter('completed')" class="{{ $filterStatus == 'completed' ? 'text-yellow-400 border-b-2 border-yellow-400' : 'text-foreground hover:text-yellow-400' }}">Completed</button>
                    <button wire:click="setFilter('rejected')" class="{{ $filterStatus == 'rejected' ? 'text-yellow-400 border-b-2 border-yellow-400' : 'text-foreground hover:text-yellow-400' }}">Rejected</button>
                    <button wire:click="setFilter('cancelled')" class="{{ $filterStatus == 'cancelled' ? 'text-yellow-400 border-b-2 border-yellow-400' : 'text-foreground hover:text-yellow-400' }}">Cancelled</button>
                </div>

                <div class="flex items-center gap-3">
                    <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search order..."
                        class="bg-slate-950 border border-white/10 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500" />
                </div>
            </div>

            <!-- Orders List -->
            <div class="divide-y divide-white/10">
                @forelse ($this->filteredOrders as $order)
                    <div class="p-6 flex flex-col lg:flex-row gap-6 lg:items-center justify-between hover:bg-white/[0.02] transition">
                        <!-- Left: Image + details -->
                        <div class="flex gap-5">
                            <img src="{{ $order->image }}" class="w-28 h-28 rounded-2xl object-cover" />
                            <div>
                                <h3 class="text-xl font-bold">{{ $order->service_name }}</h3>
                                <p class="text-foreground mt-1">{{ $order->shop->shop_name }}</p>
                                <div class="flex flex-wrap gap-3 mt-3 text-sm text-slate-300">
                                    <span>{{ $order->color }}</span>
                                    <span>•</span>
                                    <span>{{ $order->fabric }}</span>
                                </div>
                                <p class="text-sm text-slate-500 mt-3">
                                    {{ $order->created_at->format('M d, Y • h:i A') }}
                                </p>
                            </div>
                        </div>

                        <!-- Status Tracker (dynamic) -->
                        <div class="flex-1 max-w-xl">
                            @if(in_array($order->status, ['rejected', 'cancelled']))
                                <div class="flex items-center justify-center h-full bg-red-500/10 rounded-2xl p-3 border border-red-500/30">
                                    <div class="text-center">
                                        <span class="text-red-400 text-sm font-semibold bg-red-500/20 px-3 py-1 rounded-full">
                                            Order {{ ucfirst($order->status) }}
                                        </span>
                                        <p class="text-xs text-foreground mt-2">
                                            @if($order->status == 'rejected') Unfortunately rejected. @else Cancelled & refunded. @endif
                                        </p>
                                    </div>
                                </div>
                            @else
                                <div class="flex items-center justify-between text-sm">
                                    @php
                                        $steps = ['pending', 'approved', 'processing', 'completed'];
                                        $currentIndex = array_search($order->status, $steps);
                                    @endphp
                                    @foreach($steps as $index => $step)
                                        <div class="flex flex-col items-center gap-2 {{ $index <= $currentIndex ? 'text-yellow-400' : 'text-slate-500' }}">
                                            <div class="w-10 h-10 rounded-full border-2 {{ $index <= $currentIndex ? 'border-yellow-400' : 'border-slate-500' }} flex items-center justify-center">
                                                @if($index < $currentIndex) ✓
                                                @elseif($index == $currentIndex) 
                                                    @if($step == 'processing') ⚙
                                                    @elseif($step == 'completed') ✔
                                                    @else ✓
                                                    @endif
                                                @else ○
                                                @endif
                                            </div>
                                            <span>{{ ucfirst($step) }}</span>
                                        </div>
                                        @if(!$loop->last)
                                            <div class="h-[2px] {{ $index < $currentIndex ? 'bg-yellow-400/60' : 'bg-white/20' }} flex-1 mx-2"></div>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <!-- Payment & Actions -->
                        <div class="min-w-[200px]">
                            <span class="bg-blue-500/20 text-blue-400 text-xs px-3 py-1 rounded-full">
                                {{ $order->payment_status }}
                            </span>
                            <h4 class="text-2xl font-bold mt-3">₱{{ number_format($order->total_amount, 2) }}</h4>
                            <p class="text-foreground text-sm mt-1">{{ $order->payment_method }}</p>

                            <div class="flex gap-2 mt-5">
                                <button wire:click="review({{ $order->id }})" 
                                    class="w-full bg-yellow-400 hover:bg-yellow-300 text-black font-semibold py-2 rounded-xl transition">
                                    View Details
                                </button>
                                @if($order->status === 'completed')
                                    <button wire:click="review({{ $order->id }})"
                                        class="w-full bg-green-500 hover:bg-green-400 text-white font-semibold py-2 rounded-xl transition">
                                        Add Review
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-10 text-center text-foreground">No orders found.</div>
                @endforelse
            </div>
        </div>
    </main>

    @if(session()->has('message'))
        <div class="fixed bottom-5 right-5 bg-slate-800 border border-white/20 rounded-xl px-5 py-3 text-sm text-yellow-300 shadow-2xl z-50">
            {{ session('message') }}
        </div>
    @endif
</div>