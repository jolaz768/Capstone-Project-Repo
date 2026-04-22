<div>
  
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
                Service Management
              </h2>
              <p class="text-sm text-muted-foreground-2">
                Add Services, edit and more.
              </p>
            </div>

            <div>
              <div class="inline-flex gap-x-2">
                <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-layer border border-layer-line text-layer-foreground shadow-2xs hover:bg-layer-hover disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-layer-focus" href="#">
                  View all
                </a>

                <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-primary border border-primary-line text-primary-foreground hover:bg-primary-hover focus:outline-hidden focus:bg-primary-focus disabled:opacity-50 disabled:pointer-events-none" href="{{ route('admin.service.create') }}">
                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                  Add Service
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
                  {{-- <label for="hs-at-with-checkboxes-main" class="flex">
                    <input type="checkbox" class="shrink-0 size-4 bg-transparent border-line-3 rounded-sm shadow-2xs text-primary focus:ring-0 focus:ring-offset-0 checked:bg-primary-checked checked:border-primary-checked disabled:opacity-50 disabled:pointer-events-none" id="hs-at-with-checkboxes-main">
                    <span class="sr-only">Checkbox</span>
                  </label> --}}
                </th>

                <th scope="col" class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3 text-start">
                  <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase text-foreground">
                      Service-Name
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
              <tr>
                <td class="size-px whitespace-nowrap">
                  <div class="ps-6 py-3">
                    {{-- <label for="hs-at-with-checkboxes-1" class="flex">
                      <input type="checkbox" class="shrink-0 size-4 bg-transparent border-line-3 rounded-sm shadow-2xs text-primary focus:ring-0 focus:ring-offset-0 checked:bg-primary-checked checked:border-primary-checked disabled:opacity-50 disabled:pointer-events-none" id="hs-at-with-checkboxes-1">
                      <span class="sr-only">Checkbox</span>
                    </label> --}}
                  </div>
                </td>
                <td class="size-px whitespace-nowrap">
                  <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                    <div class="flex items-center gap-x-3">
                   
                      <div class="grow">
                        <span class="block text-sm font-semibold text-foreground">Sewing</span>
                        
                      </div>
                    </div>
                  </div>
                </td>
                <td class="h-px w-72 whitespace-nowrap">
                  <div class="px-6 py-3">
                    <span class="block text-sm font-semibold text-foreground">Lorem ipsum dolor sit amet.</span>
                  </div>
                </td>
                
                <td class="size-px whitespace-nowrap">
                  <div class="px-6 py-3">
                    <span class="text-sm text-muted-foreground-1">28 Dec, 12:12</span>
                  </div>
                </td>
                <td class="size-px whitespace-nowrap">
                  <div class="px-6 py-1.5">
                    <a class="inline-flex items-center gap-x-1 text-sm text-primary decoration-2 hover:underline focus:outline-hidden focus:underline font-medium" href="#">
                      Edit
                    </a>
                  </div>
                </td>

                <td class="size-px whitespace-nowrap">
                  <div class="px-6 py-1.5">
                    <a class="inline-flex items-center gap-x-1 text-sm text-red-500 decoration-2 hover:underline focus:outline-hidden focus:underline font-medium" href="#">
                      Delete
                    </a>
                  </div>
                </td>
              </tr>

              <tr>
                <td class="size-px whitespace-nowrap">
                  <div class="ps-6 py-3">
                    {{-- <label for="hs-at-with-checkboxes-2" class="flex">
                      <input type="checkbox" class="shrink-0 size-4 bg-transparent border-line-3 rounded-sm shadow-2xs text-primary focus:ring-0 focus:ring-offset-0 checked:bg-primary-checked checked:border-primary-checked disabled:opacity-50 disabled:pointer-events-none" id="hs-at-with-checkboxes-2">
                      <span class="sr-only">Checkbox</span>
                    </label> --}}
                  </div>
                </td>
                <td class="size-px whitespace-nowrap">
                  <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                    <div class="flex items-center gap-x-3">
                      
                      <div class="grow">
                        <span class="block text-sm font-semibold text-foreground">rental</span>
                      </div>
                    </div>
                  </div>
                </td>
                <td class="h-px w-72 whitespace-nowrap">
                  <div class="px-6 py-3">
                    <span class="block text-sm font-semibold text-foreground">Lorem ipsum dolor sit amet.</span>
                  </div>
                </td>
                
                <td class="size-px whitespace-nowrap">
                  <div class="px-6 py-3">
                    <span class="text-sm text-muted-foreground-1">20 Dec, 09:27</span>
                  </div>
                </td>

                <td class="size-px whitespace-nowrap">
                  <div class="px-6 py-1.5">
                    <a class="inline-flex items-center gap-x-1 text-sm text-primary decoration-2 hover:underline focus:outline-hidden focus:underline font-medium" href="#">
                      Edit
                    </a>
                  </div>
                </td>

                <td class="size-px whitespace-nowrap">
                  <div class="px-6 py-1.5">
                    <a class="inline-flex items-center gap-x-1 text-sm text-red-500 decoration-2 hover:underline focus:outline-hidden focus:underline font-medium" href="#">
                      Delete
                    </a>
                  </div>
                </td>
                
              </tr>


            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
