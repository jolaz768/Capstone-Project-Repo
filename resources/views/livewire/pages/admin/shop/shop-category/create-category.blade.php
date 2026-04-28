<div>
    @if(session()->has('message'))
    <div class="alert alert-success text-green-500 bg-green-100 border border-green-400 border-rounded px-4 py-3 mb-4 text-center max-w-xs w-auto mx-auto radius-2xl" role="alert">
        {{ session()->get('message') }}
    </div>
    @endif
    <!-- Comment Form -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <div class="mx-auto max-w-2xl">
    <div class="text-center">
      <h2 class="text-xl text-foreground font-bold sm:text-3xl">
        Create Shop Category
      </h2>
    </div>

    <!-- Card -->
    <div class="mt-5 p-4 relative z-10 bg-card border border-card-line rounded-xl sm:mt-10 md:p-10">
      <form wire:submit.prevent="save">
        <div class="mb-4 sm:mb-8">
          <label for="hs-feedback-post-comment-name-1" class="block mb-2 text-sm font-medium text-foreground">Category Name</label>
          <input wire:model="cat_name" type="text" id="hs-feedback-post-comment-name-1" class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none" placeholder="Full name">
          @error('cat_name')
          <span class="text-sm text-red-500">{{ $message }}</span>
          @enderror
        </div>

        <div class="mb-4 sm:mb-8">
          <label for="hs-feedback-post-comment-email-1" class="block mb-2 text-sm font-medium text-foreground">Category Slug</label>
          <input wire:model="cat_slug" type="text" id="hs-feedback-post-comment-email-1" class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none" placeholder="Category slug">
            @error('cat_slug')
          <span class="text-sm text-red-500">{{ $message }}</span>
          @enderror
        </div>

        <div>
          <label for="hs-feedback-post-comment-textarea-1" class="block mb-2 text-sm font-medium text-foreground">Category Description</label>
          <div class="mt-1">
            <textarea wire:model="cat_desc" id="hs-feedback-post-comment-textarea-1" name="hs-feedback-post-comment-textarea-1" rows="3" class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none" placeholder="Leave your comment here..."></textarea>
          @error('cat_desc')
          <span class="text-sm text-red-500">{{ $message }}</span>
          @enderror
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
