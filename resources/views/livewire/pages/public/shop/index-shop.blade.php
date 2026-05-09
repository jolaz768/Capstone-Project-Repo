<div class="min-h-screen bg-layer dark:bg-gray-950">

    {{-- HERO — with responsive height + text sizing --}}
    <div class="relative min-h-[420px] md:h-[480px] overflow-hidden rounded-b-[40px] shadow-2xl">
        <img
            src="{{ asset('storage/' . $shop->shop_image) }}"
            class="absolute inset-0 w-full h-full object-cover"
            alt="{{ $shop->shop_name }}">

        <div class="absolute inset-0 bg-black/60"></div>

        <div class="relative z-10 h-full flex items-center">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 w-full py-8 md:py-0">
                <div class="max-w-2xl text-white">

                    {{-- Logo – smaller on mobile --}}
                    <span class="inline-block">
                        <img
                            src="{{ asset('storage/' . $shop->shop_logo) }}"
                            alt="Logo"
                            class="inline-block size-16 md:size-20.5 rounded-full">
                    </span>

                    {{-- Heading – responsive font sizes --}}
                    <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mt-4 md:mt-5 leading-tight">
                        {{ $shop->shop_name }}
                    </h1>

                    <p class="mt-3 md:mt-5 text-base md:text-lg text-slate-200">
                        {{ $shop->description }}
                    </p>

                    {{-- Rating --}}
                    <div class="flex items-center gap-3 mt-3 md:mt-5">
                        <div class="text-yellow-400 text-xl md:text-2xl">
                            ★★★★★
                        </div>
                        <span class="text-white/80 text-sm md:text-base">
                            120+ Customer Reviews
                        </span>
                    </div>
                    <div class="flex items-center gap-3 mt-3 md:mt-5">
                        <div class="text-green-400 text-xl md:text-sm">
                            Open:
                        </div>
                        <span class="text-white/80 text-sm md:text-base">
                            Business Operating Hours: 8:00 AM - 5:00 PM
                        </span>
                    </div>

                    {{-- Buttons --}}
                    <div class="flex flex-wrap gap-3 md:gap-4 mt-5 md:mt-8">
                        <a href="{{ route('booking.create', ['id' => $shop->id]) }}"
                            class="bg-yellow-500 hover:bg-yellow-400 text-black px-5 md:px-7 py-3 md:py-4 rounded-2xl font-semibold transition text-sm md:text-base">
                            Book Appointment
                        </a>
                        <a href="{{ route('shop.review', ['id' => $shop->id]) }}"
                            class="border border-white hover:bg-white hover:text-black px-5 md:px-7 py-3 md:py-4 rounded-2xl font-semibold transition text-sm md:text-base">
                            View Reviews
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- SERVICES --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 mt-10 md:mt-16">
        <div class="flex items-center justify-between mb-6 md:mb-8">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-foreground dark:text-gray-100">Our Services</h2>
                <p class="text-muted-foreground dark:text-gray-400 mt-1 md:mt-2">Browse tailoring services available in this shop.</p>
            </div>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($shop->services as $service)
                <div class="bg-white dark:bg-gray-800 rounded-3xl overflow-hidden shadow-xl border border-slate-100 dark:border-gray-700 hover:-translate-y-1 transition">
                    <div class="h-48 md:h-52 overflow-hidden">
                        <img
                            src="https://images.unsplash.com/photo-1625479144604-ae69462778b7?q=80&w=1200&auto=format&fit=crop"
                            class="w-full h-full object-cover"
                            alt="{{ $service->name }}">
                    </div>
                    <div class="p-5 md:p-6">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl md:text-2xl font-bold text-foreground dark:text-gray-100">{{ $service->name }}</h3>
                        </div>
                        <p class="mt-3 md:mt-4 text-slate-600 dark:text-gray-300 leading-relaxed text-sm md:text-base">
                            {{ $service->description }}
                        </p>
                        <div class="mt-4 md:mt-6 flex items-center justify-between">
                            <span class="text-xs md:text-sm text-slate-400 dark:text-gray-500">{{ $service->created_at->diffForHumans() }}</span>
                            <a href="{{ route('booking.create', ['id' => $shop->id]) }}"
                                class="bg-[#0f2342] hover:bg-[#18365f] dark:bg-gray-700 dark:hover:bg-gray-600 text-white px-4 md:px-5 py-2 md:py-3 rounded-2xl text-sm font-semibold transition">
                                Book Now
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="bg-white dark:bg-gray-800 rounded-3xl p-8 md:p-10 text-center shadow-lg border dark:border-gray-700">
                        <h3 class="text-xl md:text-2xl font-bold text-slate-700 dark:text-gray-100">No Services Available</h3>
                        <p class="text-slate-500 dark:text-gray-400 mt-2">This shop has not added services yet.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    {{-- GARMENTS --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 mt-14 md:mt-20">
        <div class="flex items-center justify-between mb-6 md:mb-8">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-foreground dark:text-gray-100">Garments Available</h2>
                <p class="text-muted-foreground dark:text-gray-400 mt-1 md:mt-2">Explore garments customized by this tailoring shop.</p>
            </div>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse ($shop->garments as $garment)
                <div class="bg-white dark:bg-gray-800 rounded-3xl overflow-hidden shadow-xl border border-slate-100 dark:border-gray-700 hover:-translate-y-1 transition">
                    <div class="relative h-64 md:h-80 overflow-hidden">
                        <img
                            src="{{ $garment->image ? asset('storage/' . $garment->image) : 'https://via.placeholder.com/300x400' }}"
                            class="w-full h-full object-cover"
                            alt="{{ $garment->name }}">
                        <div class="absolute top-3 right-3 md:top-4 md:right-4">
                            <span class="bg-yellow-500 text-black px-3 md:px-4 py-1.5 md:py-2 rounded-full text-xs md:text-sm font-bold shadow-lg">
                                ₱ {{ number_format($garment->base_price, 2) }}
                            </span>
                        </div>
                    </div>
                    <div class="p-5 md:p-6">
                        <h3 class="text-xl md:text-2xl font-bold text-foreground dark:text-gray-100">{{ $garment->name }}</h3>
                        <p class="mt-2 md:mt-3 text-slate-600 dark:text-gray-300 line-clamp-3 text-sm md:text-base">{{ $garment->description }}</p>
                        <div class="mt-4 md:mt-6 flex gap-3">
                            <button class="flex-1 bg-[#0f2342] hover:bg-[#18365f] dark:bg-gray-700 dark:hover:bg-gray-600 text-white py-2 md:py-3 rounded-2xl font-semibold transition text-sm">
                                View
                            </button>
                            <button
                                wire:click="addToCart({{ $garment->id }}, '{{ addslashes($garment->name) }}', {{ $garment->base_price }}, '{{ $garment->image }}')"
                                class="flex-1 bg-yellow-500 hover:bg-yellow-400 text-black py-3 rounded-2xl font-semibold transition">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="bg-white dark:bg-gray-800 rounded-3xl p-8 md:p-10 text-center shadow-lg border dark:border-gray-700">
                        <h3 class="text-xl md:text-2xl font-bold text-foreground dark:text-gray-100">No Garments Available</h3>
                        <p class="text-foreground dark:text-gray-400 mt-2">This shop has not added garments yet.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div> 

    {{-- BOOKING SECTION --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 mt-14 md:mt-20 pb-16 md:pb-20">
        <div class="bg-[#0f2342] rounded-[40px] overflow-hidden shadow-2xl">
            <div class="grid lg:grid-cols-2 gap-6 md:gap-10 p-6 md:p-10 items-center">
                <div class="text-white">
                    <span class="bg-yellow-500 text-black px-3 md:px-4 py-1.5 md:py-2 rounded-full text-sm font-semibold">
                        Quick Booking
                    </span>
                    <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold mt-4 md:mt-6">Book Your Tailoring Appointment</h2>
                    <p class="mt-3 md:mt-5 text-slate-300 text-base md:text-lg">Schedule your fitting and tailoring services online.</p>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-3xl p-6 md:p-8 shadow-xl border dark:border-gray-700">
                    <h3 class="text-2xl md:text-3xl font-bold text-black dark:text-gray-100 mb-4 md:mb-6">Create Booking</h3>
                    <form method="GET" action="{{ route('booking.create', ['id' => $shop->id]) }}">
                        <div class="space-y-4 md:space-y-5">
                            <div>
                                <label class="block mb-1.5 md:mb-2 font-semibold text-slate-700 dark:text-gray-200">Select Date</label>
                                <input
                                    type="date"
                                    name="date"
                                    class="w-full border border-slate-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-slate-700 dark:text-gray-200 rounded-2xl px-4 md:px-5 py-3 md:py-4 focus:ring-2 focus:ring-yellow-500 focus:outline-none">
                            </div>
                            <button type="submit"
                                class="w-full bg-yellow-500 hover:bg-yellow-400 text-black py-3 md:py-4 rounded-2xl font-bold text-lg transition">
                                Book Appointment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>