<div>
  @if(session()->has('message'))
    <div class="alert alert-success">
      <span
        class="text-green-500 border-green-200 bg-green-100 px-4 py-3 rounded-lg inline-block text-center">{{ session()->get('message') }}</span>
    </div>
  @endif
  {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
  <!-- Comment Form -->
  <div class="max-w-340 px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="mx-auto max-w-2xl">
      <div class="text-center">
        <h2 class="text-xl text-foreground-1 font-bold sm:text-3xl">
          Booking Form
        </h2>
      </div>

      <!-- Card -->
      <div class="mt-5 p-4 relative z-10 bg-card border border-card-line rounded-xl sm:mt-10 md:p-10">
        <form wire:submit.prevent="createBooking">
          @if (session()->has('message'))
            <div class="mb-6 rounded-lg border border-success/20 bg-success/10 p-4 text-sm text-success-foreground">
              {{ session('message') }}
            </div>
          @endif

          <div class="mb-4 sm:mb-8">
            <label for="date" class="block mb-2 text-sm font-medium text-foreground">Appointment Date</label>
            <input wire:model.defer="bookingDate" type="date" id="date"
              class="py-2.5 sm:py-3 px-4 block w-full bg-card-line border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus" />
            @error('bookingDate') <p class="mt-1 text-sm text-destructive">{{ $message }}</p> @enderror
          </div>

          <h1 class="my-2 text-xl  text-center font-mono">Customer Details</h1>

          <div class="mb-4 sm:mb-8">
            <label for="hs-feedback-post-comment-email-1" class="block mb-2 text-sm font-medium text-foreground">Email
              address</label>
            <input wire:model.defer="customerEmail" type="email" id="hs-feedback-post-comment-email-1"
              class="py-2.5 sm:py-3 px-4 block w-full bg-card-line border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus"
              placeholder="Email address" />
            @error('customerEmail') <p class="mt-1 text-sm text-destructive">{{ $message }}</p> @enderror
          </div>

          <div class="mb-4 sm:mb-8">
            <label for="hs-feedback-post-comment-full-name-1"
              class="block mb-2 text-sm font-medium text-foreground">Full Name</label>
            <input wire:model.defer="customerName" type="text" id="hs-feedback-post-comment-full-name-1"
              class="py-2.5 sm:py-3 px-4 block w-full bg-card-line border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus"
              placeholder="Full Name" />
            @error('customerName') <p class="mt-1 text-sm text-destructive">{{ $message }}</p> @enderror
          </div>

          <h3 class="my-2 text-xl text-center font-mono">Select Service</h3>

          <div>
            <label for="hs-feedback-post-comment-textarea-1"
              class="block mb-2 text-sm font-medium text-foreground">Service</label>
            <div class="mt-1">
              <div class="mb-4 sm:mb-8">
                <select wire:model.defer="serviceId" type="text" id="hs-feedback-post-garment"
                  class="py-2.5 sm:py-3 px-4 block w-full bg-card-line border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none"
                  placeholder="Full Name">
                  <option value="">Select a service</option>
                  @foreach ($this->shop->services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                  @endforeach
                </select>
                @error('serviceId') <p class="mt-1 text-sm text-destructive">{{ $message }}</p> @enderror
              </div>
            </div>
          </div>

          <h3 class="my-2 text-xl text-center font-mono">Select Garment</h3>

          <div class="mb-4 sm:mb-8">
            <label class="block mb-2 text-sm font-medium text-foreground">Garment</label>

            <div class="grid grid-cols-2 gap-x-4 gap-y-2">

              @forelse ($this->shop->garments as $garment)
                <label class="flex items-center gap-x-2 cursor-pointer">
                  <input wire:model="selectedGarmentIds" type="checkbox" name="garment[]" value="{{ $garment->id }}"
                    class="shrink-0 rounded border-gray-300 text-primary focus:ring-primary">
                  <span class="text-sm text-foreground">{{ $garment->name }}</span>
                </label>

              @empty
                <p class="text-sm text-muted-foreground">No garments available for this shop.</p>

              @endforelse

              @error('selectedGarmentIds') <p class="mt-2 text-sm text-destructive">{{ $message }}</p> @enderror
            </div>
            <div class="mt-4">
              <button type="button" wire:click="loadMeasurements"
                class="rounded-lg bg-primary px-4 py-2 text-sm font-medium text-primary-foreground hover:bg-primary-hover">
                Add Measurements
              </button>
            </div>

            <!-- Measurement section – now conditionally shown -->
            @if($showMeasurements)
              @if ($this->selectedGarments->isEmpty())
                <div class="mt-4 text-sm text-muted-foreground">Choose at least one garment to see measurement inputs.</div>
              @else
                @foreach ($this->selectedGarments as $garment)
                  {{-- same measurement fields as before --}}
                @endforeach
              @endif
            @endif

            <div class="mt-6 rounded-lg border border-card-line bg-card p-5">
              <div class="flex items-center justify-between">
                <div>
                  <h4 class="text-lg font-semibold text-foreground">Selected measurement inputs</h4>
                  <p class="text-sm text-muted-foreground">Fill the values for each selected garment.</p>
                </div>
                <div class="text-sm font-semibold text-foreground">Total: ₱{{ number_format($this->totalPrice, 2) }}
                </div>
              </div>

              @if ($this->selectedGarments->isEmpty())
                <div class="mt-4 text-sm text-muted-foreground">Choose at least one garment to see measurement inputs.
                </div>
              @else
                @foreach ($this->selectedGarments as $garment)
                  @if ($garment->measurementTemplate)
                    <div class="mt-6 rounded-2xl border border-card-line bg-base p-4">
                      <div class="mb-3 flex items-center justify-between gap-4">
                        <div class="text-base font-semibold text-foreground">{{ $garment->name }} —
                          {{ $garment->measurementTemplate->name }}</div>
                        <div class="flex items-center gap-2">
                          <label class="text-sm font-medium text-foreground">Qty:</label>
                          <input wire:model.defer="quantities.{{ $garment->id }}" type="number" min="1" value="1"
                            class="w-20 rounded-lg border border-layer-line bg-card-line px-3 py-2 text-sm text-foreground focus:border-primary-focus focus:ring-primary-focus" />
                        </div>
                      </div>
                      <div class="grid gap-4 sm:grid-cols-2">
                        @foreach ($garment->measurementTemplate->measurementFields as $field)
                          <div>
                            <label class="block mb-2 text-sm font-medium text-foreground">{{ $field->field_name }}
                              ({{ $field->unit }})</label>
                            <input wire:model.defer="measurementValues.{{ $field->id }}" type="number" step="0.01" min="0"
                              class="py-2.5 sm:py-3 px-4 block w-full bg-card-line border-layer-line rounded-lg sm:text-sm text-foreground focus:border-primary-focus focus:ring-primary-focus"
                              placeholder="Enter value" />
                            @error('measurementValues.' . $field->id) <p class="mt-1 text-sm text-destructive">{{ $message }}
                            </p> @enderror
                          </div>
                        @endforeach
                      </div>
                    </div>

                  @else
                    <div class="mt-6 rounded-2xl border border-warning/20 bg-warning/10 p-4 text-sm text-foreground">
                      <div class="flex items-center justify-between gap-4">
                        <div><strong>{{ $garment->name }}</strong> — No measurement template configured.</div>
                        <div class="flex items-center gap-2">
                          <label class="text-sm font-medium text-foreground">Qty:</label>
                          <input wire:model.defer="quantities.{{ $garment->id }}" type="number" min="1" value="1"
                            class="w-20 rounded-lg border border-layer-line bg-card-line px-3 py-2 text-sm text-foreground focus:border-primary-focus focus:ring-primary-focus" />
                        </div>
                      </div>
                    </div>
                  @endif
                @endforeach
              @endif
            </div>

            {{-- <div>
              <label for="hs-feedback-post-comment-textarea-1"
                class="block mb-2 text-sm font-medium text-foreground mt-5">Size</label>
              <div class="mt-1">
                <div class="mb-4 sm:mb-8">
                  <select type="text" id="hs-feedback-post-garment"
                    class="py-2.5 sm:py-3 px-4 block w-full bg-card-line border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none"
                    placeholder="Full Name">
                    <option value="1">Select-Size</option>
                    <option value="2">Small: 8-10</option>
                    <option value="3">Medium: 10-12</option>
                    <option value="4">LARGE: 12-14</option>
                    <option value="5">XLARGE: 14-16</option>
                    <option value="6">XXLARGE: 16-18</option>
                  </select>
                </div>
              </div>
            </div>

          </div> --}}

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