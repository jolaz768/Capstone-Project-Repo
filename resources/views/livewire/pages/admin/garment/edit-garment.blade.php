<div>
  {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
  <!-- Hire Us -->
  <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="max-w-xl mx-auto">
      <div class="text-center ">
        <h1 class="text-3xl font-bold text-foreground sm:text-4xl">
          Edit Garment
        </h1>
      </div>

      <div class="mt-12 p-4 relative z-10 bg-card border border-card-line rounded-xl sm:mt-10 md:p-10">
        <!-- Form -->
        <form>
          <div class="grid gap-4 lg:gap-6">
            <!-- Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
              <div>
                <label for="hs-name-hire-us-2" class="block mb-2 text-sm text-foreground font-medium">Garment
                  Name</label>
                <input type="text" name="hs-name-hire-us-2" id="hs-name-hire-us-2"
                  class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none"
                  placeholder="Garment-name">
              </div>

              <div>
                <label for="hs-image-hire-us-2" class="block mb-2 text-sm text-foreground font-medium">Image</label>
                <input type="File" name="hs-image-hire-us-2" id="hs-image-hire-us-2"
                  class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none">
              </div>
            </div>
            <!-- End Grid -->

            <div>
              <label for="hs-category-hire-us-2" class="block mb-2 text-sm text-foreground font-medium">Category</label>
              <select type="text" name="hs-category-hire-us-2" id="hs-category-hire-us-2"
                class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none">
                <option>Select-Category</option>
                <option>blazer</option>
                <option>T-shirt</option>
                <option>Pants</option>
              </select>
            </div>

            <!-- Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
              <div>
                <label for="hs-measurement_template-hire-us-2"
                  class="block mb-2 text-sm text-foreground font-medium">Measurement-Template</label>
                <select type="text" name="hs-measurement_template-hire-us-2" id="hs-measurement_template-hire-us-2"
                  class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none">
                  <option>Select-Measurement-Template</option>
                  <option>blazer</option>
                  <option>T-shirt</option>
                  <option>Pants</option>
                </select>
              </div>

              <div>
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
                    <span class="text-muted-foreground-1">Peso</span>
                  </div>
                </div>

              </div>
            </div>

            <!-- End Grid -->
            
            <!-- Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
              <div>
                 <label for="hs-input-with-leading-and-trailing-icon"
                  class="block mb-2 text-sm text-foreground font-medium">Fabric</label>
                <div class="max-w-sm w-full space-y-3">
                  <div class="flex items-center">
                    <input type="checkbox"
                      class="shrink-0 size-4 bg-transparent border-line-3 rounded-sm shadow-2xs text-primary focus:ring-0 focus:ring-offset-0 checked:bg-primary-checked checked:border-primary-checked disabled:opacity-50 disabled:pointer-events-none"
                      id="hs-default-checkbox">
                    <label for="hs-default-checkbox" class="text-sm ms-3 text-muted-foreground-">Cotton</label>
                  </div>
                </div>
              </div>

              <div>
                <label for="hs-input-with-leading-and-trailing-icon"
                  class="block mb-2 text-sm text-foreground font-medium">Color</label>
                <div>
                <div class="max-w-sm w-full space-y-3">
                  <div class="flex items-center">
                    <input type="checkbox"
                      class="shrink-0 size-4 bg-transparent border-line-3 rounded-sm shadow-2xs text-primary focus:ring-0 focus:ring-offset-0 checked:bg-primary-checked checked:border-primary-checked disabled:opacity-50 disabled:pointer-events-none"
                      id="hs-default-checkbox">
                    <label for="hs-default-checkbox" class="text-sm ms-3 text-muted-foreground-">White</label>
                  </div>
                </div>
              </div>

              </div>

            </div>

            <!-- End Grid -->

            <div>
              <label for="hs-description-us-2"
                class="block mb-2 text-sm text-foreground font-medium">Description</label>
              <textarea id="hs-description-us-2" name="hs-description-us-2" rows="4"
                class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none"
                placeholder="Description"></textarea>
            </div>
          </div>
          <!-- End Grid -->



          <div class="mt-6 grid">
            <button type="submit"
              class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg bg-primary border border-primary-line text-primary-foreground hover:bg-primary-hover focus:outline-hidden focus:bg-primary-focus disabled:opacity-50 disabled:pointer-events-none">Submit</button>
          </div>


      </div>
    </div>
    </form>

    <!-- End Form -->
  </div>
</div>
</div>

<!-- End Hire Us -->
</div>