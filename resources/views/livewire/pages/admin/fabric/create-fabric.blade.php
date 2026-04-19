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
          <form>
            <div class="mb-4 sm:mb-8">
              <label for="hs-feedback-create-fabric-name-1"
                class="block mb-2 text-sm font-medium text-foreground">Name</label>
              <input type="text" id="hs-feedback-create-fabric-name-1"
                class="py-2.5 sm:py-3 px-4 block w-name bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none"
                placeholder="Fabric Name">
            </div>

            <div class="mb-4 sm:mb-8">
              <label for="hs-feedback-create-fabric-image-1"
                class="block mb-2 text-sm font-medium text-foreground">Image</label>
              <input type="file" id="hs-feedback-create-fabric-image-1"
                class="py-2.5 sm:py-3 px-4 block w-name bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none"
                placeholder="image">
            </div>

            <div class="mb-4 sm:mb-8">
              <label for="hs-feedback-create-fabric-color-1"
                class="block mb-2 text-sm font-medium text-foreground">Color</label>
              <input type="checkbox"
                class="shrink-0 size-4 bg-transparent border-line-3 rounded-sm shadow-2xs text-primary focus:ring-0 focus:ring-offset-0 checked:bg-primary-checked checked:border-primary-checked disabled:opacity-50 disabled:pointer-events-none"
                id="hs-default-checkbox">
              <label for="hs-default-checkbox" class="text-sm ms-3 text-muted-foreground-">White</label>
            </div>

            <div>
              <label for="hs-feedback-create-fabric-textarea-1"
                class="block mb-2 text-sm font-medium text-foreground">Description</label>
              <div class="mt-1">
                <textarea id="hs-feedback-create-fabric-textarea-1" name="hs-feedback-create-fabric-textarea-1" rows="3"
                  class=" w-full py-2.5 sm:py-3 px-4 block w-name bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none"
                  placeholder="Description here..."></textarea>
              </div>
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