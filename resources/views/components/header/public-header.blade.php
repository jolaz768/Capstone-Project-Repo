<!-- ========== HEADER ========== -->
<header class="flex flex-wrap lg:justify-start lg:flex-nowrap z-50 w-full py-7 bg-gradient-to-r from-gray-950 to-cyan-500">
  <nav class="relative max-w-7xl w-full flex flex-wrap lg:grid lg:grid-cols-12 basis-full items-center px-4 md:px-6 lg:px-8 mx-auto">
    <div class="lg:col-span-3 flex items-center">
      <!-- Logo -->
      <a class="flex-none rounded-xl text-xl inline-block font-semibold focus:outline-hidden focus:opacity-80" href="{{route('index.page') }}" aria-label="Preline">
       <h1 class="text-white hover:text-primary-100 text-underline">TailoringHub</h1>
      </a>
      <!-- End Logo -->

      <div class="ms-1 sm:ms-2">

      </div>
    </div>

    <!-- Button Group -->
    <div class="flex items-center gap-x-1 lg:gap-x-2 ms-auto py-1 lg:ps-6 lg:order-3 lg:col-span-3">
   @guest
                <!-- Show when NOT logged in -->
                <a href="{{ route('login.page') }}"
                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium text-nowrap rounded-xl bg-primary border border-primary-line text-primary-foreground hover:bg-primary-hover focus:outline-hidden focus:bg-primary-focus transition disabled:opacity-50 disabled:pointer-events-none">
                    Sign in
                </a>
                
                <a href="{{ route('register.page') }}"
                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium text-nowrap rounded-xl bg-primary border border-primary-line text-primary-foreground hover:bg-primary-hover focus:outline-hidden focus:bg-primary-focus transition disabled:opacity-50 disabled:pointer-events-none">
                    Sign up
                </a>
            @endguest

            @auth
                <!-- Show when logged in -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium text-nowrap rounded-xl bg-primary border border-primary-line text-primary-foreground hover:bg-primary-hover focus:outline-hidden focus:bg-primary-focus transition disabled:opacity-50 disabled:pointer-events-none">
                        Log-Out
                    </button>
                </form>
            @endauth

      <div class="lg:hidden">
        <button type="button" class="hs-collapse-toggle size-9.5 flex justify-center items-center text-sm font-semibold rounded-xl bg-layer border border-layer-line text-layer-foreground hover:bg-layer-hover focus:outline-hidden focus:bg-layer-focus disabled:opacity-50 disabled:pointer-events-none" id="hs-pro-hcail-collapse" aria-expanded="false" aria-controls="hs-pro-hcail" aria-label="Toggle navigation" data-hs-collapse="#hs-pro-hcail">
          <svg class="hs-collapse-open:hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
          <svg class="hs-collapse-open:block hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
      </div>
    </div>
    <!-- End Button Group -->

    <!-- Collapse -->
    <div id="hs-pro-hcail" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow lg:block lg:w-auto lg:basis-auto lg:order-2 lg:col-span-6" aria-labelledby="hs-pro-hcail-collapse" role="region">
      <div class="flex flex-col gap-y-4 gap-x-0 mt-5 lg:flex-row lg:justify-center lg:items-center lg:gap-y-0 lg:gap-x-7 lg:mt-0">
        <div>
          <a class="relative inline-block text-white hover:text-primary-400 "  href="{{route('index.page') }}" aria-current="page">Home</a>
        </div>
        
        <div>
          <a class="relative inline-block text-white hover:text-primary-400 text-underline focus:outline-hidden "  href="#">About</a>
        </div>
        
      </div>
    </div>
    <!-- End Collapse -->
  </nav>
</header>
<!-- ========== END HEADER ========== -->