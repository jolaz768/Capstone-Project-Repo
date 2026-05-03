<div>
  @if(session()->has('success'))
    <div class="alert alert-success mb-6">
      <span class="text-green-500 border-green-200 bg-green-100 px-4 py-3 rounded-lg inline-block">{{ session()->get('success') }}</span>
    </div>
  @endif

  <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="mx-auto max-w-3xl">
      <div class="text-center mb-10">
        <h2 class="text-2xl text-foreground font-bold sm:text-4xl">Add Garment</h2>
      </div>

      <div class="p-4 bg-card border border-card-line rounded-xl sm:p-10">
        <form wire:submit.prevent="save">
          <div class="grid gap-4 sm:grid-cols-2">
            <div>
              <label class="block mb-2 text-sm font-medium text-foreground">Garment Name</label>
              <input wire:model="name" type="text"
                class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus"
                placeholder="Garment name">
              @error('name')<span class="text-sm text-red-500">{{ $message }}</span>@enderror
            </div>

            <div>
              <label class="block mb-2 text-sm font-medium text-foreground">Slug</label>
              <input wire:model="slug" type="text"
                class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus"
                placeholder="slug">
              @error('slug')<span class="text-sm text-red-500">{{ $message }}</span>@enderror
            </div>

            <div>
              <label class="block mb-2 text-sm font-medium text-foreground">Category</label>
              <select wire:model="category_id"
                class="py-3 px-4 block w-full bg-layer border-layer-line rounded-lg text-sm text-foreground focus:border-primary-focus focus:ring-primary-focus">
                <option value="" disabled>Select a category</option>
                @foreach($this->categories() as $category)
                  <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                @endforeach
              </select>
              @error('category_id')<span class="text-sm text-red-500">{{ $message }}</span>@enderror
            </div>

            <div>
              <label class="block mb-2 text-sm font-medium text-foreground">Measurement Template</label>
              <select wire:model="measurement_template_id"
                class="py-3 px-4 block w-full bg-layer border-layer-line rounded-lg text-sm text-foreground focus:border-primary-focus focus:ring-primary-focus">
                <option value="" disabled>Select a measurement template</option>
                @foreach($this->measurementTemplates() as $template)
                  <option value="{{ $template->id }}">{{ $template->name }}</option>
                @endforeach
              </select>
              @error('measurement_template_id')<span class="text-sm text-red-500">{{ $message }}</span>@enderror
            </div>

            <div>
              <label class="block mb-2 text-sm font-medium text-foreground">Base Price</label>
              <div class="relative">
                <input wire:model="base_price" type="decimal"
                  class="py-2.5 sm:py-3 px-4 ps-9 pe-16 block w-full bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus"
                  placeholder="0.00">
                <div class="absolute inset-y-0 start-0 flex items-center ps-4 pointer-events-none text-muted-foreground-1">₱</div>
                <div class="absolute inset-y-0 end-0 flex items-center pe-4 pointer-events-none text-muted-foreground-1">PESO</div>
              </div>
              @error('base_price')<span class="text-sm text-red-500">{{ $message }}</span>@enderror
            </div>

            <div class="sm:col-span-2">
              <label class="block mb-2 text-sm font-medium text-foreground">Image</label>
              <input wire:model="image" type="file"
                class="w-full text-sm text-foreground file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-primary-foreground hover:file:bg-primary-hover" />
              @error('image')<span class="text-sm text-red-500">{{ $message }}</span>@enderror
            </div>
          </div>

          <div class="mt-6 p-4 bg-layer border border-layer-line rounded-xl">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-4">
              <div>
                <label class="block mb-2 text-sm font-medium text-foreground">Fabric & Color combinations</label>
                <p class="text-sm text-muted-foreground-1">Enter fabric name and color for each row. Use more rows for multiple colors.</p>
              </div>
              <button type="button" wire:click="addFabricColorRow"
                class="inline-flex items-center justify-center rounded-lg bg-primary px-4 py-2 text-sm font-medium text-primary-foreground hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-primary-focus">
                Add row
              </button>
            </div>

            <div class="space-y-6">
              @foreach($fabricColorRows as $index => $row)
                <div class="space-y-4 p-4 border border-layer-line rounded-xl bg-muted/5">
                  <div class="grid gap-4 sm:grid-cols-2 items-end">
                    <div>
                      <label class="block mb-2 text-sm font-medium text-foreground">Fabric</label>
                      <input wire:model="fabricColorRows.{{ $index }}.fabric_name" type="text"
                        class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus"
                        placeholder="e.g. Silk">
                      @error("fabricColorRows.{$index}.fabric_name")<span class="text-sm text-red-500">{{ $message }}</span>@enderror
                    </div>

                    <div class="text-right">
                      <button type="button" wire:click="removeFabricColorRow({{ $index }})"
                        class="inline-flex items-center justify-center rounded-lg border border-layer-line bg-layer px-4 py-2 text-sm font-medium text-foreground hover:bg-muted-foreground/10 focus:outline-none focus:ring-2 focus:ring-primary-focus">
                        Remove fabric
                      </button>
                    </div>
                  </div>

                  <div class="space-y-3">
                    <div class="flex items-center justify-between gap-4">
                      <div>
                        <label class="block mb-2 text-sm font-medium text-foreground">Colors</label>
                        <p class="text-sm text-muted-foreground-1">Add one or more colors for this fabric.</p>
                      </div>
                      <button type="button" wire:click="addFabricColorInput({{ $index }})"
                        class="inline-flex items-center justify-center rounded-lg bg-primary px-4 py-2 text-sm font-medium text-primary-foreground hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-primary-focus">
                        Add color
                      </button>
                    </div>

                    <div class="space-y-3">
                      @foreach($row['colors'] as $colorIndex => $colorName)
                        <div class="grid gap-4 sm:grid-cols-2 items-end">
                          <div>
                            <input wire:model="fabricColorRows.{{ $index }}.colors.{{ $colorIndex }}" type="text"
                              class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus"
                              placeholder="e.g. Green">
                            @error("fabricColorRows.{$index}.colors.{$colorIndex}")<span class="text-sm text-red-500">{{ $message }}</span>@enderror
                          </div>
                          <div class="text-right">
                            <button type="button" wire:click="removeFabricColorInput({{ $index }}, {{ $colorIndex }})"
                              class="inline-flex items-center justify-center rounded-lg border border-layer-line bg-layer px-4 py-2 text-sm font-medium text-foreground hover:bg-muted-foreground/10 focus:outline-none focus:ring-2 focus:ring-primary-focus">
                              Remove color
                            </button>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              @endforeach
            </div>

            @error('fabricColorRows')<div class="mt-3 text-sm text-red-500">{{ $message }}</div>@enderror
          </div>

          @if($this->measurementFields()->isNotEmpty())
            <div class="mt-6 p-4 bg-layer border border-layer-line rounded-xl">
              <h3 class="text-base font-semibold text-foreground mb-4">Measurements</h3>
              <div class="grid gap-4 sm:grid-cols-2">
                @foreach($this->measurementFields() as $field)
                  <div>
                    <label class="block mb-2 text-sm font-medium text-foreground">{{ $field->field_name }} ({{ $field->unit }})</label>
                    <input wire:model.defer="values.{{ $field->id }}" type="text"
                      class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus"
                      placeholder="Enter {{ strtolower($field->field_name) }}">
                    @error('values.' . $field->id)<span class="text-sm text-red-500">{{ $message }}</span>@enderror
                  </div>
                @endforeach
              </div>
            </div>
          @endif

          <div class="mt-6">
            <label class="block mb-2 text-sm font-medium text-foreground">Description</label>
            <textarea wire:model="description" rows="4"
              class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus"
              placeholder="Enter garment description"></textarea>
            @error('description')<span class="text-sm text-red-500">{{ $message }}</span>@enderror
          </div>

          <div class="mt-8 grid">
            <button type="submit"
              class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg bg-primary border border-primary-line text-primary-foreground hover:bg-primary-hover focus:outline-hidden focus:bg-primary-focus">
              Create Garment
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>