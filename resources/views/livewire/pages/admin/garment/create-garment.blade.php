<div>
  @if(session()->has('success'))
    <div class="alert alert-success mb-6">
      <span
        class="text-green-500 border-green-200 bg-green-100 px-4 py-3 rounded-lg inline-block">{{ session()->get('success') }}</span>
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
              <label class="block mb-2 text-sm font-medium text-foreground">Base Price</label>
              <div class="relative">
                <input wire:model="base_price" type="decimal"
                  class="py-2.5 sm:py-3 px-4 ps-9 pe-16 block w-full bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus"
                  placeholder="0.00">
                <div
                  class="absolute inset-y-0 start-0 flex items-center ps-4 pointer-events-none text-muted-foreground-1">
                  ₱</div>
                <div
                  class="absolute inset-y-0 end-0 flex items-center pe-4 pointer-events-none text-muted-foreground-1">
                  PESO</div>
              </div>
              @error('base_price')<span class="text-sm text-red-500">{{ $message }}</span>@enderror


              <div class="sm:col-span-2">
                <label class="block mb-2 text-sm font-medium text-foreground">Image</label>
                <input wire:model="image" type="file"
                  class="w-full text-sm text-foreground file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-primary-foreground hover:file:bg-primary-hover" />
                @error('image')<span class="text-sm text-red-500">{{ $message }}</span>@enderror
              </div>
              @if ($image)
                <div class="mt-4">
                  <p class="mb-2 text-sm font-medium text-foreground">Image preview</p>
                  <img src="{{ $image->temporaryUrl() }}" alt="image preview" class="object-cover rounded-lg w-40 h-40" />
                </div>
              @endif
            </div>

            {{-- <div class="sm:col-span-2">
              @foreach ($fabrics as $fabric )
                <label class="block mb-2 text-sm font-medium text-foreground">{{ $fabric->name }}</label>
                <input wire:model="fabrics" type="checkbox" value="{{ $fabric->id }}" class="" />
              @endforeach
              
            </div>
            @error('fabrics')<span class="text-sm text-red-500">{{ $message }}</span>@enderror --}}

          </div>

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