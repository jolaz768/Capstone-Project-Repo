<div>
    {{-- The Master doesn't talk, he acts. --}}
    <!-- MAIN GRID: REVIEWS + BOOKING -->
    <div class="mt-10 grid lg:grid-cols-3 gap-6">

        <!-- REVIEWS -->
        <div class="lg:col-span-3">
            <a href="{{ route('shop.view') }}"
                class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-full bg-primary border border-primary-line text-primary-foreground hover:bg-primary-hover focus:outline-hidden focus:bg-primary-hover disabled:opacity-50 disabled:pointer-events-none">

                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Back to Shop
            </a>

            <h2 class="text-xl font-semibold mb-4 text-center">Customer Reviews</h2>
            <div class=" bg-card border border-card-line rounded-lg p-4 mb-6 ">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 ">

                    <!-- RIGHT: FILTER BUTTONS -->
                    <div class="inline-flex flex-wrap gap-2 ">
                        <button type="button"
                            class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent text-primary-600 hover:bg-primary-100 focus:outline-hidden focus:bg-primary-100 hover:text-primary-800 focus:outline-hidden focus:bg-primary-100 focus:text-primary-800 disabled:opacity-50 disabled:pointer-events-none dark:text-primary-500 dark:hover:bg-primary-500/20 dark:hover:text-primary-400 dark:focus:bg-primary-500/20 dark:focus:text-primary-400">
                            All
                        </button>
                        <button type="button"
                            class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent text-primary-600 hover:bg-primary-100 focus:outline-hidden focus:bg-primary-100 hover:text-primary-800 focus:outline-hidden focus:bg-primary-100 focus:text-primary-800 disabled:opacity-50 disabled:pointer-events-none dark:text-primary-500 dark:hover:bg-primary-500/20 dark:hover:text-primary-400 dark:focus:bg-primary-500/20 dark:focus:text-primary-400">
                            5 Star
                        </button>
                        <button type="button"
                            class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent text-primary-600 hover:bg-primary-100 focus:outline-hidden focus:bg-primary-100 hover:text-primary-800 focus:outline-hidden focus:bg-primary-100 focus:text-primary-800 disabled:opacity-50 disabled:pointer-events-none dark:text-primary-500 dark:hover:bg-primary-500/20 dark:hover:text-primary-400 dark:focus:bg-primary-500/20 dark:focus:text-primary-400">
                            4 Star
                        </button>
                        <button type="button"
                            class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent text-primary-600 hover:bg-primary-100 focus:outline-hidden focus:bg-primary-100 hover:text-primary-800 focus:outline-hidden focus:bg-primary-100 focus:text-primary-800 disabled:opacity-50 disabled:pointer-events-none dark:text-primary-500 dark:hover:bg-primary-500/20 dark:hover:text-primary-400 dark:focus:bg-primary-500/20 dark:focus:text-primary-400">
                            with Media
                        </button>
                    </div>

                </div>
            </div>

            <!-- Card -->
            <div class="flex flex-col bg-card border border-card-line shadow-2xs rounded-xl">
                <div class="p-4 md:p-5">
                    <div class="flex items-center gap-x-4 mb-3">
                        <div
                            class="inline-flex justify-center items-center size-15.5 rounded-full border-4 border-primary-100 dark:border-primary-900 overflow-hidden shrink-0">
                            <img class="w-20 h-20 object-cover rounded-full"
                                src="https://images.pexels.com/photos/28238144/pexels-photo-28238144.jpeg" alt="Logo">
                        </div>
                        <div class="shrink-0">
                            <h3 class="block text-sm font-semibold text-foreground-1">John doe</h3>

                            <div class="grow">
                                <p class="text-xs uppercase font-medium text-foreground-1">
                                    Rating: <span class="font-semibold text-xl text-yellow-500">★★★★★</span>
                                </p>
                                <p class="mt-1 text-xl sm:text-xs font-semibold text-foreground-1">
                                    Sevices: <span class="font-xs text-foreground-1"> Sewing </span>
                                </p>
                            </div>
                        </div>

                    </div>
                    <img src="https://plus.unsplash.com/premium_photo-1675186049366-64a655f8f537?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        class=" mt-4 rounded-lg
                        object-cover w-20 h-20">
                    <p class="mt-2 text-sm text-foreground-1">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia ipsam, error illum nostrum
                        soluta, tempore provident qui natus, voluptates sunt maiores! Corporis, mollitia dicta,
                        obcaecati consequatur iure qui sed porro molestiae explicabo soluta illum officiis perspiciatis
                        laboriosam facere, repellat animi dolorem ex delectus! Quia molestiae ut magni officiis dolore
                        saepe error, repudiandae nulla unde, laudantium non explicabo dolorem nobis ipsam vel officia
                        qui accusantium illo quidem similique! Libero, ipsum modi! Veniam nihil eligendi tempora minima
                        dolor debitis. Laboriosam ea minus in porro, optio, ratione tempore facere sequi vitae dolore
                        delectus at corrupti! Neque facere fugiat illum quasi sint ex fuga?
                    </p>

                    <div class="flex items-center gap-x-4 mt-4">
                        <p class="text-xs uppercase font-medium text-foreground-1">Date: <span
                                class="font-semibold text-foreground-1"> 12/12/2022</span>
                        </p>
                    </div>

                </div>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="flex flex-col bg-card border border-card-line shadow-2xs rounded-xl">
                <div class="p-4 md:p-5">
                    <div class="flex items-center gap-x-4 mb-3">
                        <div
                            class="inline-flex justify-center items-center size-15.5 rounded-full border-4 border-primary-100 dark:border-primary-900 overflow-hidden shrink-0">
                            <img class="w-20 h-20 object-cover rounded-full"
                                src="https://images.pexels.com/photos/28238144/pexels-photo-28238144.jpeg" alt="Logo">
                        </div>
                        <div class="shrink-0">
                            <h3 class="block text-sm font-semibold text-foreground-1">John doe</h3>

                            <div class="grow">
                                <p class="text-xs uppercase font-medium text-foreground-1">
                                    Rating: <span class="font-semibold text-xl text-yellow-500">★★★★★</span>
                                </p>
                                <p class="mt-1 text-xl sm:text-xs font-semibold text-foreground-1">
                                    Sevices: <span class="font-xs text-foreground-1"> Sewing </span>
                                </p>
                            </div>
                        </div>

                    </div>
                    <img src="https://plus.unsplash.com/premium_photo-1675186049366-64a655f8f537?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        class=" mt-4 rounded-lg
                        object-cover w-20 h-20">
                    <p class="mt-2 text-sm text-foreground-1">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia ipsam, error illum nostrum
                        soluta, tempore provident qui natus, voluptates sunt maiores! Corporis, mollitia dicta,
                        obcaecati consequatur iure qui sed porro molestiae explicabo soluta illum officiis perspiciatis
                        laboriosam facere, repellat animi dolorem ex delectus! Quia molestiae ut magni officiis dolore
                        saepe error, repudiandae nulla unde, laudantium non explicabo dolorem nobis ipsam vel officia
                        qui accusantium illo quidem similique! Libero, ipsum modi! Veniam nihil eligendi tempora minima
                        dolor debitis. Laboriosam ea minus in porro, optio, ratione tempore facere sequi vitae dolore
                        delectus at corrupti! Neque facere fugiat illum quasi sint ex fuga?
                    </p>

                    <div class="flex items-center gap-x-4 mt-4">
                        <p class="text-xs uppercase font-medium text-foreground-1">Date: <span
                                class="font-semibold text-foreground-1"> 12/12/2022</span>
                        </p>
                    </div>

                </div>
            </div>

            <!-- Card -->
            <div class="flex flex-col bg-card border border-card-line shadow-2xs rounded-xl">
                <div class="p-4 md:p-5">
                    <div class="flex items-center gap-x-4 mb-3">
                        <div
                            class="inline-flex justify-center items-center size-15.5 rounded-full border-4 border-primary-100 dark:border-primary-900 overflow-hidden shrink-0">
                            <img class="w-20 h-20 object-cover rounded-full"
                                src="https://images.pexels.com/photos/28238144/pexels-photo-28238144.jpeg" alt="Logo">
                        </div>
                        <div class="shrink-0">
                            <h3 class="block text-sm font-semibold text-foreground-1">John doe</h3>

                            <div class="grow">
                                <p class="text-xs uppercase font-medium text-foreground-1">
                                    Rating: <span class="font-semibold text-xl text-yellow-500">★★★★★</span>
                                </p>
                                <p class="mt-1 text-xl sm:text-xs font-semibold text-foreground-1">
                                    Sevices: <span class="font-xs text-foreground-1"> Sewing </span>
                                </p>
                            </div>
                        </div>

                    </div>
                    <img src="https://plus.unsplash.com/premium_photo-1675186049366-64a655f8f537?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        class=" mt-4 rounded-lg
                        object-cover w-20 h-20">
                    <p class="mt-2 text-sm text-foreground-1">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia ipsam, error illum nostrum
                        soluta, tempore provident qui natus, voluptates sunt maiores! Corporis, mollitia dicta,
                        obcaecati consequatur iure qui sed porro molestiae explicabo soluta illum officiis perspiciatis
                        laboriosam facere, repellat animi dolorem ex delectus! Quia molestiae ut magni officiis dolore
                        saepe error, repudiandae nulla unde, laudantium non explicabo dolorem nobis ipsam vel officia
                        qui accusantium illo quidem similique! Libero, ipsum modi! Veniam nihil eligendi tempora minima
                        dolor debitis. Laboriosam ea minus in porro, optio, ratione tempore facere sequi vitae dolore
                        delectus at corrupti! Neque facere fugiat illum quasi sint ex fuga?
                    </p>

                    <div class="flex items-center gap-x-4 mt-4">
                        <p class="text-xs uppercase font-medium text-foreground-1">Date: <span
                                class="font-semibold text-foreground-1"> 12/12/2022</span>
                        </p>
                    </div>

                </div>
            </div>

            <!-- Card -->
            <div class="flex flex-col bg-card border border-card-line shadow-2xs rounded-xl">
                <div class="p-4 md:p-5">
                    <div class="flex items-center gap-x-4 mb-3">
                        <div
                            class="inline-flex justify-center items-center size-15.5 rounded-full border-4 border-primary-100 dark:border-primary-900 overflow-hidden shrink-0">
                            <img class="w-20 h-20 object-cover rounded-full"
                                src="https://images.pexels.com/photos/28238144/pexels-photo-28238144.jpeg" alt="Logo">
                        </div>
                        <div class="shrink-0">
                            <h3 class="block text-sm font-semibold text-foreground-1">John doe</h3>

                            <div class="grow">
                                <p class="text-xs uppercase font-medium text-foreground-1">
                                    Rating: <span class="font-semibold text-xl text-yellow-500">★★★★★</span>
                                </p>
                                <p class="mt-1 text-xl sm:text-xs font-semibold text-foreground-1">
                                    Sevices: <span class="font-xs text-foreground-1"> Sewing </span>
                                </p>
                            </div>
                        </div>

                    </div>
                    <img src="https://plus.unsplash.com/premium_photo-1675186049366-64a655f8f537?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        class=" mt-4 rounded-lg
                        object-cover w-20 h-20">
                    <p class="mt-2 text-sm text-foreground-1">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia ipsam, error illum nostrum
                        soluta, tempore provident qui natus, voluptates sunt maiores! Corporis, mollitia dicta,
                        obcaecati consequatur iure qui sed porro molestiae explicabo soluta illum officiis perspiciatis
                        laboriosam facere, repellat animi dolorem ex delectus! Quia molestiae ut magni officiis dolore
                        saepe error, repudiandae nulla unde, laudantium non explicabo dolorem nobis ipsam vel officia
                        qui accusantium illo quidem similique! Libero, ipsum modi! Veniam nihil eligendi tempora minima
                        dolor debitis. Laboriosam ea minus in porro, optio, ratione tempore facere sequi vitae dolore
                        delectus at corrupti! Neque facere fugiat illum quasi sint ex fuga?
                    </p>

                    <div class="flex items-center gap-x-4 mt-4">
                        <p class="text-xs uppercase font-medium text-foreground-1">Date: <span
                                class="font-semibold text-foreground-1"> 12/12/2022</span>
                        </p>
                    </div>

                </div>
            </div>

            <!-- Pagination -->
            <nav class="bg-card border border-card-line rounded-lg p-4 mb-6 mt-3 flex items-center justify-center gap-x-1"
                aria-label="Pagination">
                <button type="button"
                    class="min-h-9.5 min-w-9.5 py-2 px-2.5 inline-flex justify-center items-center gap-x-1.5 text-sm rounded-lg text-foreground hover:bg-muted-hover focus:outline-hidden focus:bg-muted-focus disabled:opacity-50 disabled:pointer-events-none"
                    aria-label="Previous">
                    <svg aria-hidden="true" class="hidden shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="m15 18-6-6 6-6" />
                    </svg>
                    <span>Previous</span>
                </button>
                <div class="flex items-center gap-x-1">
                    <button type="button"
                        class="min-h-9.5 min-w-9.5 flex justify-center items-center text-foreground hover:bg-muted-hover py-2 px-3 text-sm rounded-lg focus:outline-hidden focus:bg-muted-focus disabled:opacity-50 disabled:pointer-events-none"
                        aria-current="page">1</button>
                    <button type="button"
                        class="min-h-9.5 min-w-9.5 flex justify-center items-center text-foreground hover:bg-muted-hover py-2 px-3 text-sm rounded-lg focus:outline-hidden focus:bg-muted-focus disabled:opacity-50 disabled:pointer-events-none">2</button>
                    <button type="button"
                        class="min-h-9.5 min-w-9.5 flex justify-center items-center text-foreground hover:bg-muted-hover py-2 px-3 text-sm rounded-lg focus:outline-hidden focus:bg-muted-focus disabled:opacity-50 disabled:pointer-events-none">3</button>
                </div>
                <button type="button"
                    class="min-h-9.5 min-w-9.5 py-2 px-2.5 inline-flex justify-center items-center gap-x-1.5 text-sm rounded-lg text-foreground hover:bg-muted-hover focus:outline-hidden focus:bg-muted-focus disabled:opacity-50 disabled:pointer-events-none"
                    aria-label="Next">
                    <span>Next</span>
                    <svg aria-hidden="true" class="hidden shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6" />
                    </svg>
                </button>
            </nav>
            <!-- End Pagination -->
        </div>
        <!-- End Sign In -->
    </div>
</div>
</div>