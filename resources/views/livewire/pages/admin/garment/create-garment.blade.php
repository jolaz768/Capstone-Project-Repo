<div>
  @if(session()->has('success'))
    <div class="alert alert-success">
      <span class="text-green-500 border-green-200 bg-green-100">{{ session()->get('success') }}
      </span>
    </div>
  @endif
  <!-- Comment Form -->
  <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="mx-auto max-w-2xl">
      <div class="text-center">
        <h2 class="text-xl text-foreground font-bold sm:text-3xl">
          Add Garment
        </h2>
      </div>

      <!-- Card -->
      <div class="mt-5 p-4 relative z-10 bg-card border border-card-line rounded-xl sm:mt-10 md:p-10">
        <form wire:submit.prevent="save">
          <div class="mb-4 sm:mb-8">
            <label for="hs-feedback-post-comment-name-1" class="block mb-2 text-sm font-medium text-foreground">Garment
              Name</label>
            <input wire:model="name" type="text" id="hs-feedback-post-comment-name-1"
              class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none"
              placeholder="Full name">
          </div>
          @error('name')
          <span class="text-sm text-red-500">{{ $message }}</span>
          @enderror

          <div class="mb-4 sm:mb-8">
            <label for="hs-feedback-post-comment-name-1" class="block mb-2 text-sm font-medium text-foreground">Slug</label>
            <input wire:model="slug" type="text" id="hs-feedback-post-comment-name-1"
              class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none"
              placeholder="slug">
          </div>
           @error('slug')
          <span class="text-sm text-red-500">{{ $message }}</span>
          @enderror

          <div class="mb-4 sm:mb-8">
            <label for="hs-feedback-post-comment-name-1" class="block mb-2 text-sm font-medium text-foreground">Image</label>
            <input wire:model="image" type="file" id="hs-feedback-post-comment-name-1"
              class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none"
              placeholder="Full name">
          </div>
           @error('image')
          <span class="text-sm text-red-500">{{ $message }}</span>
          @enderror

          <div class="mb-4 sm:mb-8">
            <label for="hs-feedback-post-comment-email-1"
              class="block mb-2 text-sm font-medium text-foreground">Category</label>
            <select wire:model="category_id"
              class="py-3 px-4 pe-9 block w-full bg-layer border-layer-line rounded-lg text-sm text-foreground focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none">
              <option selected>Open this select menu</option>
              @foreach ($this->categories() as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
          </div>
           @error('category_id')
          <span class="text-sm text-red-500">{{ $message }}</span>
          @enderror

          <div class="mb-4 sm:mb-8">
            <label for="hs-input-with-leading-and-trailing-icon"
              class="block mb-2 text-sm text-foreground font-medium">Price</label>
            <div class="relative">
              <input type="text" id="hs-input-with-leading-and-trailing-icon"
                name="hs-input-with-leading-and-trailing-icon"
                class="py-2.5 sm:py-3 px-4 ps-9 pe-16 block w-full bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:z-10 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none"
                placeholder="0.00">
              <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-4">
                <span class="text-muted-foreground-1">₱</span>
              </div>
              <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-4">
                <span class="text-muted-foreground-1">PESO</span>
              </div>
            </div>
          </div>
           @error('price')
          <span class="text-sm text-red-500">{{ $message }}</span>
          @enderror

          <div>
            <label for="hs-feedback-post-comment-textarea-1"
              class="block mb-2 text-sm font-medium text-foreground">Description</label>
            <div class="mt-1">
              <textarea id="hs-feedback-post-comment-textarea-1" name="hs-feedback-post-comment-textarea-1" rows="3"
                class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none"
                placeholder="Leave your comment here..."></textarea>
            </div>
          </div>
           @error('description')
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