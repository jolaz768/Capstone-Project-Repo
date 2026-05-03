<div>
  @if(session()->has('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
  @endif

  <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="mx-auto max-w-2xl">
      <div class="text-center">
        <h2 class="text-xl text-foreground font-bold sm:text-3xl">
          Create Measurement Template
        </h2>
      </div>

      <!-- Card -->
      <div class="mt-5 p-4 relative z-10 bg-card border border-card-line rounded-xl sm:mt-10 md:p-10">
        <form wire:submit.prevent="save">
          <!-- Template Name -->
          <div class="mb-4 sm:mb-6">
            <label class="block mb-2 text-sm font-medium text-foreground">Template Name</label>
            <input wire:model="name" type="text"
              class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg sm:text-sm text-foreground"
              placeholder="e.g., Body Measurements">
            @error('name') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
          </div>

          <!-- Garment Selection -->
          <div class="mb-4 sm:mb-6">
            <label class="block mb-2 text-sm font-medium text-foreground">Select Garment</label>
            <select wire:model="garment_id"
              class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg sm:text-sm text-foreground">
              <option value="">-- Choose Garment --</option>
              @foreach ($this->garments as $garment)
                <option value="{{ $garment->id }}">{{ $garment->name }}</option>
              @endforeach
            </select>
            @error('garment_id') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
          </div>

          <!-- Dynamic Fields Section -->
          <div class="mb-4 sm:mb-6">
            <label class="block mb-2 text-sm font-medium text-foreground">Measurement Fields</label>
            <div class="space-y-3">
              @foreach ($fields as $index => $field)
                <div class="flex flex-wrap sm:flex-nowrap gap-3 items-start">
                  <div class="flex-1">
                    <input wire:model="fields.{{ $index }}.field_name"
                      class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg sm:text-sm"
                      placeholder="Field name (e.g., Chest)">
                    @error("fields.{$index}.field_name")
                      <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="w-32">
                    <input wire:model="fields.{{ $index }}.unit"
                      class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg sm:text-sm"
                      placeholder="Unit (e.g., cm)">
                    @error("fields.{$index}.unit")
                      <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                  </div>
                  <button type="button" wire:click="removeField({{ $index }})"
                    class="mt-1 px-3 py-2 text-sm font-medium rounded-lg bg-red-500 border border-primary-line text-primary-foreground hover:bg-red-600">✕</button>
                </div>
              @endforeach

            </div>
            <button type="button" wire:click="addField"
              class="mt-3 py-2 px-4 text-sm font-medium rounded-lg bg-primary border border-line-5 text-primary-foreground hover:bg-primary-hover">+ Add Another Field</button>
            @error('fields') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror
          </div>

          <button type="submit"
            class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg bg-primary border border-primary-line text-primary-foreground hover:bg-primary-hover">
            Create Template & Fields
          </button>
        </form>
      </div>
    </div>
  </div>
</div>