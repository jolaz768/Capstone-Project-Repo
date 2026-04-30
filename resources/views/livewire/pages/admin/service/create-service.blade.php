<div>
      @if(session()->has('message'))
    <div class="alert alert-success text-green-500 bg-green-100 border border-green-400 border-rounded px-4 py-3 mb-4 text-center max-w-xs w-auto mx-auto radius-2xl" role="alert">
        {{ session()->get('message') }}
    </div>
    @endif
    {{-- The best athlete wants his opponent at his best. --}}
    <!-- Comment Form -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <div class="mx-auto max-w-2xl">
    <div class="text-center">
      <h2 class="text-xl text-foreground font-bold sm:text-3xl">
        Add Service
      </h2>
    </div>

    <!-- Card -->
    <div class="mt-5 p-4 relative z-10 bg-card border border-card-line rounded-xl sm:mt-10 md:p-10">
      <form wire:submit.prevent="save">
        <div class="mb-4 sm:mb-8">
        <label for="hs-feedback-post-comment-name-1" class="block mb-2 text-sm font-medium text-foreground">Service Name</label>
          <input wire:model="name" type="text" id="hs-feedback-post-comment-name-1" class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none" placeholder="Service Name">
        </div>
        @error('name')
        <span class="text-sm text-red-500">{{ $message }}</span>
            
        @enderror

        <div class="mb-4 sm:mb-8">
          <label for="slug" class="block mb-2 text-sm font-medium text-foreground">Slug</label>
          <input wire:model.live="slug" type="text" id="hs-feedback-post-comment-slug" class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none" 
        </div>
        <div>
        @error('slug')
        <span class="text-sm text-red-500">{{ $message }}</span>
            
        @enderror
            
          <label for="hs-feedback-post-comment-textarea-1" class="block mb-2 text-sm font-medium text-foreground">Description</label>
          <div class="mt-1">
            <textarea wire:model="description" id="hs-feedback-post-comment-textarea-1" name="hs-feedback-post-comment-textarea-1" rows="3" class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none" placeholder="Description here..."></textarea>
          </div>
        </div>
        @error('description')
                <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror

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
