<div>
  <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="mx-auto max-w-2xl">
      <div class="text-center">
        <h2 class="text-xl text-foreground font-bold sm:text-3xl">
          Edit Shop
        </h2>
      </div>

      <!-- Card -->
      <div class="mt-5 p-4 relative z-10 bg-card border border-card-line rounded-xl sm:mt-10 md:p-10">
        <form wire:submit.prevent="save">
          <!-- Shop Name -->
          <div class="mb-4 sm:mb-8">
            <label class="block mb-2 text-sm font-medium text-foreground">Shop Name</label>
            <input wire:model="shop_name" type="text"
              class="py-2.5 sm:py-3 px-4 block w-full bg-layer border border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus">
            @error('shop_name') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
          </div>

          <!-- Shop Image -->
          <div class="mb-4 sm:mb-8">
            <label class="block mb-2 text-sm font-medium text-foreground">Shop Image</label>
            @if($existing_shop_image && !$shop_image)
              <div class="mb-3">
                <img src="{{ Storage::url($existing_shop_image) }}" alt="Current shop image" class="w-32 h-32 object-cover rounded-lg border">
                <p class="text-xs text-muted-foreground mt-1">Current image</p>
              </div>
            @endif
            @if($shop_image)
              <div class="mb-3">
                <img src="{{ $shop_image->temporaryUrl() }}" alt="New image preview" class="w-32 h-32 object-cover rounded-lg border">
                <p class="text-xs text-muted-foreground mt-1">New image (will replace current)</p>
              </div>
            @endif
            <input wire:model="shop_image" type="file"
              class="py-2.5 sm:py-3 px-4 block w-full bg-layer border border-layer-line rounded-lg sm:text-sm text-foreground">
            @error('shop_image') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
          </div>

          <!-- Shop Logo -->
          <div class="mb-4 sm:mb-8">
            <label class="block mb-2 text-sm font-medium text-foreground">Shop Logo</label>
            @if($existing_shop_logo && !$shop_logo)
              <div class="mb-3">
                <img src="{{ Storage::url($existing_shop_logo) }}" alt="Current logo" class="w-24 h-24 object-cover rounded-full border">
                <p class="text-xs text-muted-foreground mt-1">Current logo</p>
              </div>
            @endif
            @if($shop_logo)
              <div class="mb-3">
                <img src="{{ $shop_logo->temporaryUrl() }}" alt="New logo preview" class="w-24 h-24 object-cover rounded-full border">
                <p class="text-xs text-muted-foreground mt-1">New logo (will replace current)</p>
              </div>
            @endif
            <input wire:model="shop_logo" type="file"
              class="py-2.5 sm:py-3 px-4 block w-full bg-layer border border-layer-line rounded-lg sm:text-sm text-foreground">
            @error('shop_logo') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
          </div>

          <!-- Contact Number -->
          <div class="mb-4 sm:mb-8">
            <label class="block mb-2 text-sm font-medium text-foreground">Contact Number</label>
            <input wire:model="phone" type="tel"
              class="py-2.5 sm:py-3 px-4 block w-full bg-layer border border-layer-line rounded-lg sm:text-sm text-foreground">
            @error('phone') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
          </div>

          <!-- Address -->
          <div class="mb-4 sm:mb-8">
            <label class="block mb-2 text-sm font-medium text-foreground">Address</label>
            <input wire:model="address" type="text"
              class="py-2.5 sm:py-3 px-4 block w-full bg-layer border border-layer-line rounded-lg sm:text-sm text-foreground">
            @error('address') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
          </div>

          <!-- Description -->
          <div class="mb-4 sm:mb-8">
            <label class="block mb-2 text-sm font-medium text-foreground">Description</label>
            <textarea wire:model="description" rows="3"
              class="py-2.5 sm:py-3 px-4 block w-full bg-layer border border-layer-line rounded-lg sm:text-sm text-foreground"></textarea>
            @error('description') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
          </div>

          <!-- Active Toggle -->
          <div class="mb-6 flex items-center">
            <label for="hs-basic-usage" class="relative inline-block w-11 h-6 cursor-pointer">
              <input wire:model="is_active" type="checkbox" id="hs-basic-usage" class="peer sr-only">
              <span class="absolute inset-0 bg-surface-1 rounded-full transition-colors duration-200 peer-checked:bg-primary-checked"></span>
              <span class="absolute top-1/2 start-0.5 -translate-y-1/2 size-5 bg-white rounded-full shadow-sm transition-transform duration-200 peer-checked:translate-x-full"></span>
            </label>
            <label for="hs-basic-usage" class="ml-2 text-sm font-medium text-foreground">Active</label>
          </div>
          @error('is_active') <span class="text-sm text-red-500">{{ $message }}</span> @enderror

          <!-- Submit -->
          <div class="mt-6 grid">
            <button type="submit"
              class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg bg-primary border border-primary-line text-primary-foreground hover:bg-primary-hover">
              Update Shop
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>