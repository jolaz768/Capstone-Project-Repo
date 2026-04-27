<div>
  @if(session()->has('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
  @endif
  {{-- The Master doesn't talk, he acts. --}}
  <!-- Comment Form -->
  <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="mx-auto max-w-2xl">
      <div class="text-center">
        <h2 class="text-xl text-foreground font-bold sm:text-3xl">
          Add Color
        </h2>
      </div>

      <!-- Card -->
      <div class="mt-5 p-4 relative z-10 bg-card border border-card-line rounded-xl sm:mt-10 md:p-10">
        <form wire:submit.prevent="save">
          <!-- Color Picker (for selection) -->
          <div class="mb-4 sm:mb-8">
            <label class="block mb-2 text-sm font-medium text-foreground">Pick a Color</label>
            <input type="color" wire:model="color_code"
              class="w-full h-10 rounded border border-layer-line cursor-pointer">
          </div>

          <!-- Color Name -->
          <div class="mb-4 sm:mb-8">
            <label for="color_name" class="block mb-2 text-sm font-medium text-foreground">Color Name</label>
            <input wire:model.debounce.300ms="color_name" type="text" id="color_name"
              class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none"
              placeholder="e.g. Red">
            @error('color_name')
              <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
          </div>

          <!-- Color Code (Hex) -->
          <div class="mb-4 sm:mb-8">
            <label class="block mb-2 text-sm font-medium text-foreground">Color Code (Hex)</label>
            <input wire:model="color_code" type="text" readonly
              class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none">
            @error('color_code')
              <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-4 sm:mb-8">
            <div class="h-12 rounded-lg border border-layer-line" style="background: {{ $color_code }}"></div>
          </div>

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