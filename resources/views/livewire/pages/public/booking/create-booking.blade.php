<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <!-- Comment Form -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <div class="mx-auto max-w-2xl">
    <div class="text-center">
      <h2 class="text-xl text-foreground-1 font-bold sm:text-3xl">
        Booking  Form
      </h2>
    </div>

    <!-- Card -->
    <div class="mt-5 p-4 relative z-10 bg-card border border-card-line rounded-xl sm:mt-10 md:p-10">
      <form>
        <div class="mb-4 sm:mb-8">
          <label for="date" class="block mb-2 text-sm font-medium text-foreground">Apointment Date</label>
          <input type="date" id="date" name="date" class="py-2.5 sm:py-3 px-4 block w-full bg-card-line border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none" placeholder="Date"  value="{{ request('date') }}">
        </div>

         <h1 class="my-2 text-xl  text-center font-mono">Customer Details</h1>
         
        <div class="mb-4 sm:mb-8">
         
          <label for="hs-feedback-post-comment-email-1" class="block mb-2 text-sm font-medium text-foreground">Email address</label>
          <input type="email" id="hs-feedback-post-comment-email-1" class="py-2.5 sm:py-3 px-4 block w-full bg-card-line border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none" placeholder="Email address">
        </div>

        <div class="mb-4 sm:mb-8">
          <label for="hs-feedback-post-comment-full-name-1" class="block mb-2 text-sm font-medium text-foreground">Full Name</label>
          <input type="text" id="hs-feedback-post-comment-full-name-1" class="py-2.5 sm:py-3 px-4 block w-full bg-card-line border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none" placeholder="Full Name">
        </div>

        <h3 class="my-2 text-xl text-center font-mono">Select Service</h3>

        <div>
          <label for="hs-feedback-post-comment-textarea-1"
            class="block mb-2 text-sm font-medium text-foreground">Service</label>
          <div class="mt-1">
            <div class="mb-4 sm:mb-8">
              <select type="text" id="hs-feedback-post-garment"
                class="py-2.5 sm:py-3 px-4 block w-full bg-card-line border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none"
                placeholder="Full Name">
                <option value="1">Select-Service</option>
                <option value="2">Sewing</option>
                <option value="3">Alteration</option>
                <option value="4">Rental</option>
              </select>
            </div>
          </div>
        </div>

        <h3 class="my-2 text-xl text-center font-mono">Select Garment</h3>

       <div class="mb-4 sm:mb-8">
    <label class="block mb-2 text-sm font-medium text-foreground">Garment</label>

    <div class="grid grid-cols-2 gap-x-4 gap-y-2">

        <label class="flex items-center gap-x-2 cursor-pointer">
            <input type="checkbox" name="garment[]" value="t-shirt"
                class="shrink-0 rounded border-gray-300 text-primary focus:ring-primary">
            <span class="text-sm text-foreground">T-Shirt</span>
        </label>

        <label class="flex items-center gap-x-2 cursor-pointer">
            <input type="checkbox" name="garment[]" value="polo"
                class="shrink-0 rounded border-gray-300 text-primary focus:ring-primary">
            <span class="text-sm text-foreground">Polo</span>
        </label>

        <label class="flex items-center gap-x-2 cursor-pointer">
            <input type="checkbox" name="garment[]" value="shorts"
                class="shrink-0 rounded border-gray-300 text-primary focus:ring-primary">
            <span class="text-sm text-foreground">Shorts</span>
        </label>

        <label class="flex items-center gap-x-2 cursor-pointer">
            <input type="checkbox" name="garment[]" value="pants"
                class="shrink-0 rounded border-gray-300 text-primary focus:ring-primary">
            <span class="text-sm text-foreground">Pants</span>
        </label>

        <label class="flex items-center gap-x-2 cursor-pointer">
            <input type="checkbox" name="garment[]" value="jacket"
                class="shrink-0 rounded border-gray-300 text-primary focus:ring-primary">
            <span class="text-sm text-foreground">Jacket</span>
        </label>

        <label class="flex items-center gap-x-2 cursor-pointer">
            <input type="checkbox" name="garment[]" value="dress"
                class="shrink-0 rounded border-gray-300 text-primary focus:ring-primary">
            <span class="text-sm text-foreground">Dress</span>
        </label>

    </div>
    <div class="grid grid-cols-2 gap-x-4 gap-y-2">
      
    </div>  
    
</div>
        
        

        <div class="mt-6 grid">
          <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg bg-primary border border-primary-line text-primary-foreground hover:bg-primary-hover focus:outline-hidden focus:bg-primary-focus disabled:opacity-50 disabled:pointer-events-none">Submit</button>
        </div>
      </form>
    </div>
    <!-- End Card -->
  </div>
</div>
<!-- End Comment Form -->
</div>
