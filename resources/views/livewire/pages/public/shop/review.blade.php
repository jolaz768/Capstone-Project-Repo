<div class="min-h-screen bg-gray-50 dark:bg-gray-900 transition-colors">

    <!-- ===== SHOP HEADER ===== -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border dark:border-gray-700 p-6 md:flex md:items-center md:justify-between">
            <div class="flex-1">
                <div class="flex items-center gap-3">
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Perfect Stitch Tailors</h1>
                </div>
                <p class="text-gray-500 dark:text-gray-400 mt-1 flex items-center gap-2">
                    <!-- SVG icon remains the same, but we can add dark: to stroke if needed -->
                    <svg class="w-4 h-4 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    Bandra West, Mumbai
                </p>
                <div class="flex items-center gap-3 mt-2">
                    <div class="flex items-center text-yellow-400 dark:text-yellow-300">
                        @for ($i = 1; $i <= 5; $i++)
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        @endfor
                    </div>
                    <span class="text-gray-600 dark:text-gray-300 font-medium">4.8 (120 Reviews)</span>
                </div>
                <p class="mt-2 text-sm font-medium text-green-600 dark:text-green-400 flex items-center gap-1">
                    <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                    Open · Closes at 8:00 PM
                </p>
            </div>
            <div class="mt-4 md:mt-0 flex gap-3">
                <a href="#" class="px-5 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-200 font-medium hover:bg-gray-50 dark:hover:bg-gray-700 transition">View Shop</a>
                <a href="#" class="px-5 py-2.5 rounded-lg bg-indigo-600 dark:bg-indigo-500 text-white font-medium hover:bg-indigo-700 dark:hover:bg-indigo-400 transition">Book Appointment</a>
            </div>
        </div>
    </div>

    <!-- ===== CONTENT ===== -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- LEFT: Rating Summary + Write Review -->
            <div class="lg:col-span-1 space-y-8">
                <!-- Rating Summary -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border dark:border-gray-700 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Customer Reviews</h3>
                    <div class="flex items-center gap-4 mb-6">
                        <span class="text-4xl font-bold text-gray-900 dark:text-white">4.8</span>
                        <div>
                            <div class="flex text-yellow-400 dark:text-yellow-300 mb-1">
                                @for ($i = 1; $i <= 5; $i++)
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                @endfor
                            </div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Based on 120 reviews</p>
                        </div>
                    </div>

                    <!-- Rating Distribution -->
                    <div class="space-y-2">
                        @php
                            $ratings = [5 => 92, 4 => 18, 3 => 7, 2 => 1, 1 => 0];
                            $total = array_sum($ratings);
                        @endphp
                        @foreach([5,4,3,2,1] as $star)
                            @php $percent = $total > 0 ? ($ratings[$star] / $total) * 100 : 0; @endphp
                            <div class="flex items-center gap-2">
                                <span class="text-sm text-gray-600 dark:text-gray-300 w-4">{{ $star }}</span>
                                <div class="flex-1 h-2 bg-gray-200 dark:bg-gray-700 rounded-full">
                                    <div class="h-2 bg-yellow-400 dark:bg-yellow-300 rounded-full" style="width: {{ $percent }}%"></div>
                                </div>
                                <span class="text-sm text-gray-600 dark:text-gray-300 w-8">{{ $ratings[$star] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Write a Review -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border dark:border-gray-700 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Write a Review</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Share your experience with this shop</p>
                    <!-- Star selector (Alpine) -->
                    <div x-data="{ rating: 0 }" class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Your Rating</label>
                        <div class="flex gap-1">
                            @for ($i = 1; $i <= 5; $i++)
                                <button type="button" @click="rating = {{ $i }}"
                                    class="text-3xl focus:outline-none transition"
                                    :class="rating >= {{ $i }} ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-600'">
                                    ★
                                </button>
                            @endfor
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Your Review</label>
                        <textarea rows="3"
                            class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 rounded-lg px-4 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Write your review here..."></textarea>
                    </div>
                    <button class="w-full bg-indigo-600 dark:bg-indigo-500 text-white py-2.5 rounded-lg font-medium hover:bg-indigo-700 dark:hover:bg-indigo-400 transition">
                        Submit Review
                    </button>
                </div>
            </div>

            <!-- RIGHT: All Reviews -->
            <div class="lg:col-span-2">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-6">All Reviews (120)</h3>
                <div class="space-y-6">
                    <!-- Single Review -->
                    @php
                        $reviews = [
                            ['name' => 'Rahul Verma', 'initials' => 'R', 'color' => 'indigo', 'text' => 'Excellent stitching quality...', 'helpful' => 2, 'time' => '2 days ago', 'rating' => 5],
                            ['name' => 'Sneha Patil', 'initials' => 'S', 'color' => 'pink', 'text' => 'Very happy with the service...', 'helpful' => 1, 'time' => '1 week ago', 'rating' => 5],
                            // ... add more
                        ];
                    @endphp
                    @foreach($reviews as $review)
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border dark:border-gray-700 p-6">
                        <div class="flex items-start justify-between">
                            <div class="flex gap-3">
                                <div class="w-10 h-10 rounded-full bg-{{ $review['color'] }}-100 dark:bg-{{ $review['color'] }}-900 text-{{ $review['color'] }}-600 dark:text-{{ $review['color'] }}-300 flex items-center justify-center font-bold">
                                    {{ $review['initials'] }}
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900 dark:text-white">{{ $review['name'] }}</p>
                                    <div class="flex items-center gap-2 mt-1">
                                        <span class="text-xs bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 px-2 py-0.5 rounded-full">Verified Customer</span>
                                        <span class="text-xs text-gray-500 dark:text-gray-400">{{ $review['time'] }}</span>
                                    </div>
                                    <div class="flex text-yellow-400 dark:text-yellow-300 mt-2">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <svg class="w-4 h-4 {{ $i <= $review['rating'] ? 'fill-current' : 'text-gray-300 dark:text-gray-600' }}" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                        @endfor
                                    </div>
                                    <p class="mt-3 text-gray-700 dark:text-gray-300 text-sm leading-relaxed">
                                        {{ $review['text'] }}
                                    </p>
                                    <button class="mt-2 text-xs text-gray-500 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/></svg>
                                        Helpful ({{ $review['helpful'] }})
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>