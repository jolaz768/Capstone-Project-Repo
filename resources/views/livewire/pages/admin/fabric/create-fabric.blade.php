<div>
  {{-- Care about people's approval and you will be their prisoner. --}}
  <!-Description Form -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
      <div class="mx-auto max-w-2xl">
        <div class="text-center">
          <h2 class="text-xl text-foreground font-bold sm:text-3xl">
            Add Fabric
          </h2>
        </div>

        <!-- Card -->
        <div class="mt-5 p-4 relative z-10 bg-card border border-card-line rounded-xl sm:mt-10 md:p-10">
          <form wire:submit.prevent="save">
            <div class="mb-4 sm:mb-8">
              <label for="hs-feedback-create-fabric-name-1"
                class="block mb-2 text-sm font-medium text-foreground">Name</label>
              <input wire:model="name" type="text" id="hs-feedback-create-fabric-name-1"
                class="py-2.5 sm:py-3 px-4 block w-name bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none"
                placeholder="Fabric Name">
                @error('name')
                  <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 sm:mb-8">
              <label for="hs-feedback-create-fabric-image-1"
                class="block mb-2 text-sm font-medium text-foreground">Image</label>
              <input wire:model="image" type="file" id="hs-feedback-create-fabric-image-1"
                class="py-2.5 sm:py-3 px-4 block w-name bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none"
                placeholder="image">
                @error('image')
                  <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>


            <div>
              <label for="hs-feedback-create-fabric-textarea-1"
                class="block mb-2 text-sm font-medium text-foreground">Description</label>
              <div class="mt-1">
                <textarea wire:model="description" id="hs-feedback-create-fabric-textarea-1"
                  name="hs-feedback-create-fabric-textarea-1" rows="3"
                  class=" w-full py-2.5 sm:py-3 px-4 block w-name bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none"
                  placeholder="Description here..."></textarea>
              </div>
              @error('description')
                  <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6 grid">
              <button type="submit"
                class="w-name py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg bg-primary border border-primary-line text-primary-foreground hover:bg-primary-hover focus:outline-hidden focus:bg-primary-focus disabled:opacity-50 disabled:pointer-events-none">Submit</button>
            </div>
          </form>
        </div>
        <!-- End Card -->
      </div>
    </div>
    <!-- EnDescription Form -->
</div>