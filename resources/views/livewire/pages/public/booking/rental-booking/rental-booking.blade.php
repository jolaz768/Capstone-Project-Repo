<div>
  <!-- Card Section -->
  <div class="max-w-2xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Card -->
    <div class="bg-layer rounded-xl shadow-md p-4 sm:p-7">
      <div class="text-center mb-8">
        <h2 class="text-2xl md:text-3xl font-bold text-foreground">
          Rental Booking
        </h2>
        <p class="text-sm text-muted-foreground-2">
          Manage your payment methods.
        </p>
      </div>

      <form>
        <!-- Customer Information Section -->
        <div class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-layer-line">
          <label class="inline-block text-sm font-medium text-foreground mb-2">
            Customer Information
          </label>
          <div class="space-y-3">
            <input type="text"
              class="py-1.5 sm:py-2 px-3 block w-full bg-layer border border-layer-line shadow-sm sm:text-sm rounded-lg text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none"
              placeholder="First Name">
            <input type="text"
              class="py-1.5 sm:py-2 px-3 block w-full bg-layer border border-layer-line shadow-sm sm:text-sm rounded-lg text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none"
              placeholder="Last Name">
            <input type="text"
              class="py-1.5 sm:py-2 px-3 block w-full bg-layer border border-layer-line shadow-sm sm:text-sm rounded-lg text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none"
              placeholder="Phone Number">
          </div>
        </div>

        <!-- Rental Details Section -->
        <div class="py-6 first:pt-0 last:pb-0 border-t border-layer-line">
          <label class="inline-block text-sm font-medium text-foreground mb-2">
            Rental Details
          </label>
          <div class="space-y-4">

            <select
              class="py-3 px-4 block w-full bg-layer border border-layer-line rounded-lg text-sm text-foreground focus:border-primary-focus focus:ring-primary-focus">
              <option selected>Select a Service</option>
              <option>Sewing</option>
              <option>Rental</option>
            </select>
            <!-- Garment Checkboxes (2 columns) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
              <label
                class="flex items-center p-3 w-full bg-layer border border-layer-line rounded-lg text-sm cursor-pointer">
                <input type="checkbox"
                  class="shrink-0 size-4 bg-transparent border-2 border-gray-400 rounded-sm text-primary focus:ring-0 checked:bg-primary-checked checked:border-primary-checked">
                <span class="text-sm ms-3 text-muted-foreground-1">Dress</span>
              </label>
              <label
                class="flex items-center p-3 w-full bg-layer border border-layer-line rounded-lg text-sm cursor-pointer">
                <input type="checkbox" checked
                  class="shrink-0 size-4 bg-transparent border-2 border-gray-400 rounded-sm text-primary focus:ring-0 checked:bg-primary-checked checked:border-primary-checked">
                <span class="text-sm ms-3 text-muted-foreground-1">Suit</span>
              </label>
            </div>

            <!-- Size Dropdown -->
            <select
              class="py-3 px-4 block w-full bg-layer border border-layer-line rounded-lg text-sm text-foreground focus:border-primary-focus focus:ring-primary-focus">
              <option selected>Select a size</option>
              <option>Small</option>
              <option>Medium</option>
              <option>Large</option>
            </select>

            <!-- Start & End Date (2 columns) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-foreground mb-1">Pick-Up Date</label>
                <input type="date"
                  class="py-1.5 sm:py-2 px-3 block w-full bg-layer border border-layer-line shadow-sm sm:text-sm rounded-lg text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus">
              </div>
              <div>
                <label class="block text-sm font-medium text-foreground mb-1">Return Date</label>
                <input type="date"
                  class="py-1.5 sm:py-2 px-3 block w-full bg-layer border border-layer-line shadow-sm sm:text-sm rounded-lg text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus">
              </div>
            </div>
          </div>
        </div>
      </form>

      <!-- Action Buttons -->
      <div class="mt-8 flex justify-end gap-x-3">
        <button type="button"
          class="py-1.5 sm:py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-layer border border-layer-line text-layer-foreground shadow-sm hover:bg-layer-hover">
          Cancel
        </button>
        <button type="button"
          class="py-1.5 sm:py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-primary border border-primary-line text-primary-foreground hover:bg-primary-hover">
          Save changes
        </button>
      </div>
    </div>
  </div>
</div>