<div>
  {{-- Close your eyes. Count to one. That is how long forever feels. --}}
  <!-- Comment Form -->
  <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="mx-auto max-w-2xl">
      <div class="text-center">
        <h2 class="text-xl text-foreground font-bold sm:text-3xl">
          Create Shop
        </h2>
      </div>

      <!-- Card -->
      <div class="mt-5 p-4 relative z-10 bg-card border border-card-line rounded-xl sm:mt-10 md:p-10">
        <form wire:submit.prevent="save">
          <div class="mb-4 sm:mb-8">
            <label for="hs-feedback-post-comment-shopname-1" class="block mb-2 text-sm font-medium text-foreground">Shop
              Name</label>
            <input wire:model="shop_name" type="text" id="hs-feedback-post-comment-name-1"
              class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none"
              placeholder="Shop Name">
          </div>
          @error('shop_name')
          <span class="text-sm text-red-500">{{ $message }}</span>
          @enderror


          <div class="mb-4 sm:mb-8">
            <label for="hs-feedback-post-comment-image-1" class="block mb-2 text-sm font-medium text-foreground">Image
              Shop</label>
           <input wire:model="shop_image" type="file"
                  class="w-full text-sm text-foreground file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-primary-foreground hover:file:bg-primary-hover" />
            @if ($shop_image)
              <div class="mt-4">
                <p class="mb-2 text-sm font-medium text-foreground">Image preview</p>
                <img src="{{ $shop_image->temporaryUrl() }}" alt="image preview"
                  class="object-cover rounded-lg w-40 h-40">
              </div>
            @endif
          </div>
                    @error('shop_image')
          <span class="text-sm text-red-500">{{ $message }}</span>
          @enderror

          <div class="mb-4 sm:mb-8">
            <label for="hs-feedback-post-comment-logo-1" class="block mb-2 text-sm font-medium text-foreground">Logo
              Shop</label>
                <input wire:model="shop_logo" type="file"
                  class="w-full text-sm text-foreground file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-primary-foreground hover:file:bg-primary-hover" />
            @if ($shop_logo)
              <div class="mt-4">
                <p class="mb-2 text-sm font-medium text-foreground">Logo preview</p>
                <img src="{{ $shop_logo->temporaryUrl() }}" alt="logo preview" class="object-cover rounded-lg w-40 h-40">
              </div>
            @endif
          </div>
          @error('shop_logo')
          <span class="text-sm text-red-500">{{ $message }}</span>
          @enderror

          <div class="mb-4 sm:mb-8">
            <label for="hs-feedback-post-comment-contact-1"
              class="block mb-2 text-sm font-medium text-foreground">Contact Number</label>
            <input wire:model="phone" type="text" id="hs-feedback-post-comment-contact-1"
              class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none"
              placeholder="Contact Number">
          </div>
          @error('phone')
          <span class="text-sm text-red-500">{{ $message }}</span>
          @enderror

          <div class="mb-4 sm:mb-8">
          <label for="hs-feedback-post-comment-shopname-1" class="block mb-2 text-sm font-medium text-foreground">Address</label>
            <input wire:model="address" type="text" id="hs-feedback-post-comment-name-1"
              class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none"
              placeholder="Address">
          </div>
          @error('address')
          <span class="text-sm text-red-500">{{ $message }}</span>
          @enderror


          <div>
            <label for="hs-feedback-post-comment-textarea-1"
              class="block mb-2 text-sm font-medium text-foreground">Description</label>
            <div class="mt-1">
              <textarea wire:model="description" id="hs-feedback-post-comment-textarea-1"
                name="hs-feedback-post-comment-textarea-1" rows="3"
                class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none"
                placeholder="Leave your comment here..."></textarea>
            </div>
          </div>
          @error('description')
          <span class="text-sm text-red-500">{{ $message }}</span>
          @enderror
          

          <div class="mb-4 sm:mb-8">
            <label for="hs-basic-usage" class="relative inline-block w-11 h-6 cursor-pointer">
              <input wire:model="is_active" type="checkbox" id="hs-basic-usage" class="peer sr-only">
              <span
                class="absolute inset-0 bg-surface-1 rounded-full transition-colors duration-200 ease-in-out peer-checked:bg-primary-checked peer-disabled:opacity-50 peer-disabled:pointer-events-none"></span>
              <span
                class="absolute top-1/2 start-0.5 -translate-y-1/2 size-5 bg-switch rounded-full shadow-sm transition-transform duration-200 ease-in-out peer-checked:translate-x-full"></span>
            </label>
            <label for="hs-basic-usage" class="ml-2 text-sm font-medium text-foreground">Active</label>
          </div>
          @error('is_active')
         <span class="text-sm text-red-500">{{ $message }}</span> 
          @enderror


          <div class="mt-6 grid">
            <button type="submit"
              class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg bg-primary border border-primary-line text-primary-foreground hover:bg-primary-hover focus:outline-hidden focus:bg-primary-focus disabled:opacity-50 disabled:pointer-events-none">Submit</button>
          </div>
        </form>
      </div>
      <!-- End Card -->
    </div>
  </div>
  <!-- End Comment Form -->
</div>