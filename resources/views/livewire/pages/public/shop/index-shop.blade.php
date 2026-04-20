<div>

    <!-- HERO div -->
    <div class="relative bg-cover bg-center h-[300px] border-b border-line-2 border border-radius-2xl">
        <img class="absolute inset-0 w-full h-full object-cover"
            src="https://images.unsplash.com/photo-1528698827591-e19ccd7bc23d?q=80&w=1752&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="Product Image">

        <div class="absolute inset-0 bg-black/50"></div>

        <div class="relative h-full flex items-center px-8 text-white">
            <div>
                <h1 class="text-4xl font-bold">Elegant Stitches</h1>

                <!-- Rating -->
                <div class="flex items-center gap-2 mt-2">
                    <div class="text-yellow-400 text-lg">★★★★★</div>
                    <span class="text-sm">(120 Reviews)</span>
                </div>
            </div>
        </div>
    </div>

    <!-- TABS (Preline) -->
    <!-- Tab Nav -->
    <nav class="relative z-0 flex border border-line-2 rounded-xl overflow-hidden" aria-label="Tabs" role="tablist"
        aria-orientation="horizontal">
        {{-- <a type="button" href="{{ route('shop.service') }}"
            class="hs-tab-active:border-b-primary-active hs-tab-active:text-foreground relative min-w-0 flex-1 bg-layer first:border-s-0 border-s border-b-2 border-layer-line py-4 px-4 text-muted-foreground-1 hover:text-foreground text-sm font-medium text-center overflow-hidden hover:bg-layer-hover focus:z-10 focus:outline-hidden focus:text-foreground focus:bg-layer-focus disabled:opacity-50 disabled:pointer-events-none active"
            id="bar-with-underline-item-1" aria-selected="true" data-hs-tab="#bar-with-underline-1"
            aria-controls="bar-with-underline-1" role="tab">
            Services
        </a> --}}
        <a type="button" href="{{ route('shop.review') }}"
            class="hs-tab-active:border-b-primary-active hs-tab-active:text-foreground relative min-w-0 flex-1 bg-layer first:border-s-0 border-s border-b-2 border-layer-line py-4 px-4 text-muted-foreground-1 hover:text-foreground text-sm font-medium text-center overflow-hidden hover:bg-layer-hover focus:z-10 focus:outline-hidden focus:text-foreground focus:bg-layer-focus disabled:opacity-50 disabled:pointer-events-none"
            id="bar-with-underline-item-2" aria-selected="false" data-hs-tab="#bar-with-underline-2"
            aria-controls="bar-with-underline-2" role="tab">
            Reviews
        </a>
        <button type="button"
            class="hs-tab-active:border-b-primary-active hs-tab-active:text-foreground relative min-w-0 flex-1 bg-layer first:border-s-0 border-s border-b-2 border-layer-line py-4 px-4 text-muted-foreground-1 hover:text-foreground text-sm font-medium text-center overflow-hidden hover:bg-layer-hover focus:z-10 focus:outline-hidden focus:text-foreground focus:bg-layer-focus disabled:opacity-50 disabled:pointer-events-none"
            id="bar-with-underline-item-3" aria-selected="false" data-hs-tab="#bar-with-underline-3"
            aria-controls="bar-with-underline-3" role="tab">
            Book Apointment
        </button>
                <button type="button"
            class="hs-tab-active:border-b-primary-active hs-tab-active:text-foreground relative min-w-0 flex-1 bg-layer first:border-s-0 border-s border-b-2 border-layer-line py-4 px-4 text-muted-foreground-1 hover:text-foreground text-sm font-medium text-center overflow-hidden hover:bg-layer-hover focus:z-10 focus:outline-hidden focus:text-foreground focus:bg-layer-focus disabled:opacity-50 disabled:pointer-events-none"
            id="bar-with-underline-item-3" aria-selected="false" data-hs-tab="#bar-with-underline-4"
            aria-controls="bar-with-underline-4" role="tab">
            Pricing
        </button>
    </nav>
    <!-- End Tab Nav -->

    <!-- Tab Content -->
    <div class="mt-3">
        {{-- <div id="bar-with-underline-1" role="tabpanel" aria-labelledby="bar-with-underline-item-1">
            <p class="text-muted-foreground-1">
                This is the <em class="font-semibold text-foreground">Services</em>
            </p>
        </div> --}}
        <div id="bar-with-underline-2" class="hidden" role="tabpanel" aria-labelledby="bar-with-underline-item-2">
            <p class="text-muted-foreground-1">
                This is the <em class="font-semibold text-foreground">Reviews</em>
            </p>
        </div>
        <div id="bar-with-underline-3" class="hidden" role="tabpanel" aria-labelledby="bar-with-underline-item-3">
            <p class="text-muted-foreground-1">
                This is the <em class="font-semibold text-foreground">Book Apointment</em>
            </p>
        </div>
        <div id="bar-with-underline-4" class="hidden" role="tabpanel" aria-labelledby="bar-with-underline-item-4">
            <p class="text-muted-foreground-1">
                This is the <em class="font-semibold text-foreground">Pricing</em>
            </p>
        </div>
    </div>
    <!-- End Tab Content -->

    <!-- SERVICES -->
    <div class="mt-8">
        <h1 class="text-2xl font-semibold mb-4 text-center">Our Services</h1>

        <div class="grid md:grid-cols-3 gap-6">

            <!-- Card -->
            <div class="sm:flex bg-card border border-card-line rounded-xl shadow-2xs">
                <div
                    class="shrink-0 relative w-full rounded-t-xl overflow-hidden pt-[40%] sm:rounded-s-xl sm:max-w-60 sm:rounded-se-none sm:max-w-20">
                    <img class="size-full absolute top-0 start-0 object-cover"
                        src="https://images.unsplash.com/photo-1625479144604-ae69462778b7?q=80&w=688&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Card Image">
                </div>
                <div class="flex flex-wrap">
                    <div class="p-4 flex flex-col h-full sm:p-7">
                        <h3 class="font-semibold text-foreground">
                            Sewing
                        </h3>
                        <p class="mt-1 text-muted-foreground-1">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, explicabo.
                        </p>
                        <div class="mt-5 sm:mt-auto">
                            <p class="text-xs text-muted-foreground-1">
                                Last updated 5 mins ago
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="sm:flex bg-card border border-card-line rounded-xl shadow-2xs">
                <div
                    class="shrink-0 relative w-full rounded-t-xl overflow-hidden pt-[40%] sm:rounded-s-xl sm:max-w-60 sm:rounded-se-none sm:max-w-20">
                    <img class="size-full absolute top-0 start-0 object-cover"
                        src="https://plus.unsplash.com/premium_photo-1664202526559-e21e9c0fb46a?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Card Image">
                </div>
                <div class="flex flex-wrap">
                    <div class="p-4 flex flex-col h-full sm:p-7">
                        <h3 class="font-semibold text-foreground">
                            Rental
                        </h3>
                        <p class="mt-1 text-muted-foreground-1">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Error, laboriosam.
                        </p>
                        <div class="mt-5 sm:mt-auto">
                            <p class="text-xs text-muted-foreground-1">
                                Last updated 5 mins ago
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="sm:flex bg-card border border-card-line rounded-xl shadow-2xs">
                <div
                    class="shrink-0 relative w-full rounded-t-xl overflow-hidden pt-[40%] sm:rounded-s-xl sm:max-w-60 sm:rounded-se-none sm:max-w-20">
                    <img class="size-full absolute top-0 start-0 object-cover"
                        src="https://plus.unsplash.com/premium_photo-1683140721927-aaed410fae29?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Card Image">
                </div>
                <div class="flex flex-wrap">
                    <div class="p-4 flex flex-col h-full sm:p-7">
                        <h3 class="font-semibold text-foreground">
                            Alteration
                        </h3>
                        <p class="mt-1 text-muted-foreground-1">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, molestias.
                        </p>
                        <div class="mt-5 sm:mt-auto">
                            <p class="text-xs text-muted-foreground-1">
                                Last updated 5 mins ago
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Card -->

        </div>
    </div>

    <!-- MAIN GRID: REVIEWS + BOOKING -->
    <div class="mt-10 grid lg:grid-cols-3 gap-6">

        <!-- REVIEWS -->
        <div class="lg:col-span-2">
            <h2 class="text-xl font-semibold mb-4">Customer Reviews</h2>

            <!-- Card -->
            <div
                class="flex flex-col bg-card border border-card-line shadow-2xs rounded-xl">
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
                    <img src="https://plus.unsplash.com/premium_photo-1675186049366-64a655f8f537?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class=" mt-4 rounded-lg
                        object-cover w-20 h-20">
                    <p class="mt-2 text-sm text-foreground-1">
                        quality as shit!!
                    </p>
                   
                </div>
            </div>
            <!-- End Card -->
            
        </div>

        <!-- BOOKING -->
        <div class="lg:col-span-">
            <h2 class="text-xl font-semibold mb-4">Book Appointment</h2>

            <div class="bg-card border border-card-line rounded-xl shadow-2xs">
                <!-- Sign In -->
                <div class="p-4 sm:p-7">
                    <div class="text-center">
                        <h3 id="hs-modal-signin-label" class="block text-2xl font-bold text-foreground">Create Booking
                        </h3>
                    </div>

                    <!-- Form -->
                    <form method="GET" action="{{ route('booking.create') }}">
                        <div class="grid gap-y-4">
                            <!-- Form Group -->
                            <div>
                                <label for="bookingDate" class="block text-sm mb-2 text-foreground">Date</label>
                                <div class="relative">
                                    <input type="date" id="bookingDate" name="date" class="py-2 px-4 w-full border rounded-lg">
                                    <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">

                                    </div>
                                </div>
                                <p class="hidden text-xs text-red-600 mt-2" id="date-error">Please include a valid date
                                    address so we can get back to you</p>
                            </div>
                            <!-- End Form Group -->
                            <button type="submit"
                                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg bg-primary border border-primary-line text-primary-foreground hover:bg-primary-hover focus:outline-hidden focus:bg-primary-focus disabled:opacity-50 disabled:pointer-events-none">Book</button>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>
            </div>
            <!-- End Sign In -->
        </div>
    </div>

{{-- pricing section --}}


<div class="p-4 sm:p-7">
    <div class="text-center">
        <h1 id="hs-modal-signin-label" class="block text-2xl font-bold text-foreground">Pricing</h1>
    </div>
</div>
<!-- Card Group -->
<div
    class="grid border border-card-line rounded-xl shadow-2xs divide-y overflow-hidden sm:flex sm:divide-y-0 sm:divide-x divide-card-divider mb-3">
    <!-- Card -->
    <div class="flex flex-col flex-1 bg-card">
        <img class="w-full h-40 rounded-t-xl sm:rounded-se-none sm:rounded-s-xl object-cover"
            src="https://images.unsplash.com/photo-1633966887768-64f9a867bdba?q=80&w=803&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="Card Image">
        <div class="p-4 flex-1 md:p-5">
            <h3 class="font-semibold text-foreground">
                T-Shirt
            </h3>
            <p class="mt-1 text-muted-foreground-1">
               Sewing: <span class="font-xs text-foreground-1"> $20 </span>
            </p>
            <p class="mt-1 text-muted-foreground-1">
               Sewing & Fabric: <span class="font-xs text-foreground-1"> $50 </span>
            </p>
        </div>
       
    </div>
    <!-- End Group -->

    <!-- Card -->
    <div class="flex flex-col flex-1 bg-card">
        <img class="w-full h-40 object-cover "
            src="https://images.unsplash.com/photo-1624378439575-d8705ad7ae80?q=80&w=697&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="Card Image">
        <div class="p-4 flex-1 md:p-5">
            <h3 class="font-semibold text-foreground">
                Pants
            </h3>
            <p class="mt-1 text-muted-foreground-1">
               Sewing: <span class="font-xs text-foreground-1"> $20 </span>
            </p>
            <p class="mt-1 text-muted-foreground-1">
               Sewing & Fabric: <span class="font-xs text-foreground-1"> $50 </span>
            </p>
        </div>
    </div>
    <!-- End Group -->

    <!-- Card -->
    <div class="flex flex-col flex-1 bg-card">
        <img class="w-full h-40 sm:rounded-se-xl object-cover rounded-t-xl sm:rounded-s-none sm:rounded-se-none"
            src="https://images.unsplash.com/photo-1598915850252-fb07ad1e6768?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="Card Image">
        <div class="p-4 flex-1 md:p-5">
            <h3 class="font-semibold text-foreground">
                Suits & Blazers
            </h3>
            <p class="mt-1 text-muted-foreground-1">
               Sewing: <span class="font-xs text-foreground-1"> $200 </span>
            </p>
            <p class="mt-1 text-muted-foreground-1">
               Sewing & Fabric: <span class="font-xs text-foreground-1"> $400 </span>
            </p>
        </div>
        
    </div>
    <!-- End Group -->
</div>
<!-- End Card Group -->

</div>



