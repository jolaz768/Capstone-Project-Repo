<div class="min-h-screen bg-layer dark:bg-blue-950">

    {{-- HERO SECTION --}}
    <div class="relative overflow-hidden rounded-3xl border border-line-2 dark:border-blue-800 h-[420px]">

        {{-- Background Image --}}
        <img class="absolute inset-0 w-full h-full object-cover"
            src="https://images.unsplash.com/photo-1536867520774-5b4f2628a69b?q=80&w=736&auto=format&fit=crop"
            alt="Tailor Hero">

        {{-- Overlay (keep as-is – it’s already navy) --}}
        <div class="absolute inset-0 bg-gradient-to-r from-[#071d49]/95 via-[#071d49]/85 to-black/40">
        </div>

        <div class="absolute right-[38%] top-0 h-full w-32 bg-[#071d49] rounded-r-full"></div>
        <div class="absolute right-[36%] top-0 h-full w-4 bg-yellow-400 rotate-6"></div>

        <div class="relative z-10 h-full flex items-center justify-between px-8 lg:px-14">
            {{-- LEFT --}}
            <div class="max-w-xl text-white">
                <p class="text-yellow-400 text-sm font-medium mb-4">
                    ✨ Find the Best Tailors Near You
                </p>
                <h1 class="text-5xl font-extrabold leading-tight">
                    Custom Tailoring<br>Made Easy
                </h1>
                <p class="mt-5 text-gray-300 leading-relaxed">
                    Discover expert tailoring shops, alteration services, custom garments, and premium stitching all in one place.
                </p>
                <div class="flex flex-wrap gap-4 mt-6">
                    <button class="bg-yellow-400 hover:bg-yellow-300 text-black px-6 py-3 rounded-xl font-semibold transition">
                        Explore Shops
                    </button>
                    <button class="border border-white/30 hover:bg-white/10 px-6 py-3 rounded-xl transition">
                        How It Works
                    </button>
                </div>
            </div>
            <div class="hidden lg:block relative">
                <img src="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?q=80&w=1200&auto=format&fit=crop"
                    class="h-[360px] w-[420px] object-cover rounded-3xl shadow-2xl" alt="Tailor">
            </div>
        </div>
    </div>

    {{-- FEATURED SHOPS --}}
    <div class="max-w-[90rem] overflow-hidden px-4 py-12 mx-auto">

        <div class="flex items-center justify-between mb-8">
            <div>
                {{-- SEARCH --}}
                <form action="#" method="GET" class="mt-8 flex w-full max-w-xl">
                    <div class="max-w-sm w-full space-y-3">
                        <input wire:model.live="search" id="input-base" type="text"
                            class="py-2.5 sm:py-3 px-4 rounded-lg block w-full bg-layer-500 dark:bg-blue-900 border border-line-5 dark:border-blue-700 sm:text-sm text-foreground dark:text-blue-100 placeholder:text-foreground dark:placeholder:text-blue-300 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none"
                            placeholder="Search for Tailors" aria-label="Search for Tailors">
                    </div>
                </form>
                <h2 class="text-3xl font-bold text-foreground dark:text-blue-100">
                    Featured Tailoring Shops
                </h2>
                <p class="text-muted-foreground dark:text-blue-300 mt-1">
                    Explore top-rated tailoring shops in your area.
                </p>
            </div>
        </div>

        {{-- SHOP GRID --}}
        <div class="grid sm:grid-cols-2 xl:grid-cols-4 gap-8">

            @foreach ($this->shops as $shop)
                <div class="group bg-card dark:bg-blue-900 border border-card-line dark:border-blue-800 rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition duration-300">

                    {{-- IMAGE --}}
                    <div class="relative h-56 overflow-hidden">
                        <img class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition duration-500"
                            src="{{ asset('storage/' . $shop->shop_image) }}" alt="{{ $shop->shop_name }}">

                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>

                        <div class="absolute bottom-4 left-4 flex items-center gap-3">
                            <div class="size-14 rounded-full overflow-hidden border-4 border-white shadow-lg">
                                <img class="w-full h-full object-cover" src="{{ asset('storage/' . $shop->shop_logo) }}"
                                    alt="{{ $shop->shop_name }} Logo">
                            </div>
                            <div>
                                <h3 class="text-white font-bold text-xl">{{ $shop->shop_name }}</h3>
                                <p class="text-gray-300 text-sm">📍 {{ $shop->address ?? 'Cebu City, Philippines' }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- CONTENT --}}
                    <div class="p-5">
                        <div class="flex items-center gap-2 text-sm">
                            <span class="text-yellow-500 font-semibold">★ 4.8</span>
                            <span class="text-muted-foreground dark:text-blue-300">(120 Reviews)</span>
                        </div>

                        <div class="mt-5">
                            <p class="text-sm font-semibold text-foreground dark:text-blue-100 mb-3">Services</p>
                            <div class="flex flex-wrap gap-2">
                                @forelse ($shop->Services as $service)
                                    <span class="px-3 py-1.5 rounded-full bg-[#071d49]/10 dark:bg-blue-800 text-foreground dark:text-blue-200 text-xs font-medium">
                                        {{ $service->name }}
                                    </span>
                                @empty
                                    <span class="text-sm text-muted-foreground dark:text-blue-300">No services available</span>
                                @endforelse
                            </div>
                        </div>

                        {{-- STATS --}}
                        <div class="grid grid-cols-3 gap-3 mt-6">
                            <div class="bg-layer-1 dark:bg-blue-950 rounded-xl p-3 text-center border border-line-2 dark:border-blue-800">
                                <p class="text-lg font-bold text-foreground dark:text-blue-100">{{ $shop->Services->count() }}</p>
                                <p class="text-xs text-muted-foreground dark:text-blue-300">Services</p>
                            </div>
                            <div class="bg-layer dark:bg-blue-900 rounded-xl p-3 text-center border border-line-2 dark:border-blue-800">
                                <p class="text-lg font-bold text-foreground dark:text-blue-100">{{ $shop->bookings->count() }}</p>
                                <p class="text-xs text-muted-foreground dark:text-blue-300">Bookings</p>
                            </div>
                            <div class="bg-layer dark:bg-blue-900 rounded-xl p-3 text-center border border-line-2 dark:border-blue-800">
                                <p class="text-lg font-bold text-foreground dark:text-blue-100">{{ $shop->garments->count() }}</p>
                                <p class="text-xs text-muted-foreground dark:text-blue-300">Garments</p>
                            </div>
                        </div>

                        <a href="{{ route('shop.view', ['id' => $shop->id]) }}" class="mt-6 block">
                            <button class="w-full bg-[#071d49] hover:bg-[#0b2e73] dark:bg-indigo-600 dark:hover:bg-indigo-500 text-white py-3 rounded-2xl font-semibold transition">
                                View Shop →
                            </button>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- FEATURES --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5 mt-16">

            <div class="bg-card dark:bg-blue-900 border border-card-line dark:border-blue-800 rounded-2xl p-5 flex gap-4">
                <div class="size-12 rounded-full bg-[#071d49] text-white flex items-center justify-center shrink-0">✔</div>
                <div>
                    <h4 class="font-bold text-foreground dark:text-blue-100">Verified Tailors</h4>
                    <p class="text-sm text-muted-foreground dark:text-blue-300 mt-1">All tailoring shops are verified and trusted.</p>
                </div>
            </div>

            <div class="bg-card dark:bg-blue-900 border border-card-line dark:border-blue-800 rounded-2xl p-5 flex gap-4">
                <div class="size-12 rounded-full bg-[#071d49] text-white flex items-center justify-center shrink-0">✂</div>
                <div>
                    <h4 class="font-bold text-foreground dark:text-blue-100">Quality Services</h4>
                    <p class="text-sm text-muted-foreground dark:text-blue-300 mt-1">Expert tailoring in every stitch.</p>
                </div>
            </div>

            <div class="bg-card dark:bg-blue-900 border border-card-line dark:border-blue-800 rounded-2xl p-5 flex gap-4">
                <div class="size-12 rounded-full bg-[#071d49] text-white flex items-center justify-center shrink-0">📅</div>
                <div>
                    <h4 class="font-bold text-foreground dark:text-blue-100">Easy Booking</h4>
                    <p class="text-sm text-muted-foreground dark:text-blue-300 mt-1">Book appointments quickly and securely.</p>
                </div>
            </div>

            <div class="bg-card dark:bg-blue-900 border border-card-line dark:border-blue-800 rounded-2xl p-5 flex gap-4">
                <div class="size-12 rounded-full bg-[#071d49] text-white flex items-center justify-center shrink-0">💰</div>
                <div>
                    <h4 class="font-bold text-foreground dark:text-blue-100">Affordable Pricing</h4>
                    <p class="text-sm text-muted-foreground dark:text-blue-300 mt-1">Premium tailoring services at fair prices.</p>
                </div>
            </div>

        </div>
    </div>
</div>