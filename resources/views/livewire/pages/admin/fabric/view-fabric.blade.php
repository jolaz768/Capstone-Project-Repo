<div>
  @if(session()->has('message'))
    <div class="alert alert-success text-green-500 text-center bg-green-100 border border-green-400 rounded-lg p-4 mb-4" role="alert">
      {{ session()->get('message') }}
    </div>
  @endif
  {{-- Be like water. --}}
    <!-- Table Section -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <!-- Card -->
  <div class="flex flex-col">
    <div class="overflow-x-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-none [&::-webkit-scrollbar-track]:bg-scrollbar-track [&::-webkit-scrollbar-thumb]:bg-scrollbar-thumb">
      <div class="min-w-full inline-block align-middle">
        <div class="bg-layer border border-layer-line rounded-xl shadow-2xs overflow-hidden">
          <!-- Header -->
          <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-table-line">
            <div>
              <h2 class="text-xl font-semibold text-foreground">
                Fabric Mangement
              </h2>
              <p class="text-sm text-muted-foreground-2">
                Add Fabric, edit and more.
              </p>
            </div>

            <div>
              <div class="inline-flex gap-x-2">
                <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-layer border border-layer-line text-layer-foreground shadow-2xs hover:bg-layer-hover disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-layer-focus" href="#">
                  View all
                </a>

                <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-primary border border-primary-line text-primary-foreground hover:bg-primary-hover focus:outline-hidden focus:bg-primary-focus disabled:opacity-50 disabled:pointer-events-none" href="{{ route('admin.fabric.create') }}">
                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                  Add Fabric
                </a>
              </div>
            </div>
          </div>
          <!-- End Header -->

          <!-- Table -->
          <table class="min-w-full divide-y divide-table-line">
            <thead class="bg-muted">
              <tr>
                <th scope="col" class="ps-6 py-3 text-start">
                  
                </th>

                <th scope="col" class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-foreground">
                      Name
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-foreground">
                      Image
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-foreground">
                      Description
                    </span>
                  </div>
                </th>

                

                <th scope="col" class="px-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-foreground">
                      Created
                    </span>
                  </div>
                </th>

                <th scope="col" class="px-6 py-3 text-end"></th>
              </tr>
            </thead>

            <tbody class="divide-y divide-table-line">
              @foreach ($this->fabrics as $fkey => $fabric )
              
                <tr wire:key="fabric-{{ $fabric->id }}">
                <td class="size-px whitespace-nowrap">
                  <div class="ps-6 py-3">
                    
                  </div>
                </td>
                <td class="size-px whitespace-nowrap">
                  <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                    <div class="flex items-center gap-x-3">
                      <div class="grow">
                        <span class="block text-sm font-semibold text-foreground">{{ $fabric->name }}</span>
                      </div>
                    </div>
                  </div>
                </td>
                <td class="h-px w-72 whitespace-nowrap">
                  <div class="px-6 py-3">
                    <img class="object-cover w-20 h-20" src="{{ asset('storage/' . $fabric->image) }}" alt="{{ $fabric->name }}">
                  </div>
                </td>
                <td class="size-px whitespace-nowrap">
                  <div class="px-6 py-3">
                    <span class="text-sm text-muted-foreground-1">{{ $fabric->description }}</span>
                  </div>
                </td>
                

                <td class="size-px whitespace-nowrap">
                  <div class="px-6 py-3">
                    <span class="text-sm text-muted-foreground-1">{{ $fabric->created_at->format('d M, H:i') }}</span>
                  </div>
                </td>
                <td class="size-px whitespace-nowrap">
                  <div class="px-6 py-1.5">
                    <a class="inline-flex items-center gap-x-1 text-sm text-primary decoration-2 hover:underline focus:outline-hidden focus:underline font-medium" href="{{route('admin.fabric.edit',$fabric->id) }}">
                      Edit
                    </a>          
                  </div>
                </td>

                <td class="size-px whitespace-nowrap">
                  <div class="px-6 py-1.5">
                    <a class="inline-flex items-center gap-x-1 text-sm text-red-500 decoration-2 hover:underline focus:outline-hidden focus:underline font-medium" href="#" wire:click="delete({{ $fabric->id }})">
                      Delete
                    </a>
                  </div>
                </td>
              </tr>
                
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
